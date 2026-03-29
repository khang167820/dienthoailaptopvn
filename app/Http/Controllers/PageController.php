<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\DeviceModel;
use App\Models\Post;
use App\Models\Repair;
use App\Models\ServiceType;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class PageController extends Controller
{
    /**
     * Trang chủ
     */
    public function home()
    {
        SEOMeta::setTitle('Sửa Chữa Điện Thoại & Laptop Uy Tín - dienthoailaptop.vn');
        SEOMeta::setDescription('Dịch vụ sửa chữa điện thoại, laptop chuyên nghiệp. Thay màn hình, thay pin, sửa mainboard chính hãng. Bảo hành dài hạn, lấy liền trong ngày.');
        OpenGraph::setTitle('Sửa Chữa Điện Thoại & Laptop Uy Tín');
        OpenGraph::setUrl(url('/'));

        $categories = Category::active()->orderBy('sort_order')->get();
        $brands = Brand::active()->orderBy('sort_order')->get();
        $featuredRepairs = Repair::active()->featured()
            ->with(['deviceModel.brand', 'serviceType'])
            ->limit(8)->get();
        $latestPosts = Post::published()->latest('published_at')->limit(4)->get();

        return view('pages.home', compact('categories', 'brands', 'featuredRepairs', 'latestPosts'));
    }

    /**
     * Trang Danh mục (VD: /sua-dien-thoai)
     */
    public function category(Category $category)
    {
        SEOMeta::setTitle($category->meta_title ?: $category->name . ' - dienthoailaptop.vn');
        SEOMeta::setDescription($category->meta_description ?: 'Dịch vụ ' . $category->name . ' chuyên nghiệp, uy tín tại dienthoailaptop.vn');
        SEOMeta::setCanonical(url("/{$category->slug}"));

        $brands = $category->brands()->active()->orderBy('sort_order')->get();

        return view('pages.category', compact('category', 'brands'));
    }

    /**
     * Trang Thương hiệu (VD: /sua-dien-thoai/apple)
     */
    public function brand(Category $category, Brand $brand)
    {
        SEOMeta::setTitle($brand->meta_title ?: $brand->name . ' - ' . $category->name);
        SEOMeta::setDescription($brand->meta_description ?: 'Sửa chữa ' . $brand->name . ' chuyên nghiệp: thay màn hình, thay pin, sửa mainboard...');
        SEOMeta::setCanonical(url("/{$category->slug}/{$brand->slug}"));

        $deviceModels = DeviceModel::where('brand_id', $brand->id)
            ->where('category_id', $category->id)
            ->active()->orderBy('sort_order')->get();

        return view('pages.brand', compact('category', 'brand', 'deviceModels'));
    }

    /**
     * Trang Dòng máy (VD: /sua-dien-thoai/apple/iphone-15-pro-max)
     */
    public function deviceModel(Category $category, Brand $brand, DeviceModel $deviceModel)
    {
        $repairs = Repair::where('device_model_id', $deviceModel->id)
            ->active()->with('serviceType')->orderBy('sort_order')->get();

        $title = $deviceModel->meta_title ?: 'Sửa ' . $deviceModel->name . ' - Bảng Giá Mới Nhất';
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($deviceModel->meta_description ?: 'Bảng giá sửa chữa ' . $deviceModel->name . ': thay màn hình, thay pin, sửa face ID... Bảo hành dài hạn.');
        SEOMeta::setCanonical(url("/{$category->slug}/{$brand->slug}/{$deviceModel->slug}"));

        // Schema: Product + AggregateOffer
        $schemaData = $this->buildDeviceSchema($deviceModel, $repairs);

        return view('pages.device-model', compact('category', 'brand', 'deviceModel', 'repairs', 'schemaData'));
    }

    /**
     * Trang Dịch vụ chi tiết (VD: /thay-man-hinh-iphone-15-pro-max)
     */
    public function repair(Repair $repair)
    {
        $repair->load(['deviceModel.brand.categories', 'serviceType']);

        $title = $repair->meta_title ?: ucfirst($repair->serviceType->name) . ' ' . $repair->deviceModel->name;
        SEOMeta::setTitle($title . ' - Giá Mới Nhất ' . date('Y'));
        SEOMeta::setDescription($repair->meta_description ?: $title . '. Giá chỉ từ ' . $repair->display_price . '. Bảo hành ' . ($repair->warranty ?? '6 tháng') . '. Lấy liền trong ngày.');
        SEOMeta::setCanonical(url("/{$repair->slug}"));

        // Schema: Service + FAQ
        $schemaData = $this->buildRepairSchema($repair);

        // Dịch vụ liên quan (cùng dòng máy)
        $relatedRepairs = Repair::where('device_model_id', $repair->device_model_id)
            ->where('id', '!=', $repair->id)
            ->active()->with('serviceType')->limit(6)->get();

        return view('pages.repair', compact('repair', 'schemaData', 'relatedRepairs'));
    }

    /**
     * Trang Blog
     */
    public function blog()
    {
        SEOMeta::setTitle('Blog Thủ Thuật Sửa Chữa Điện Thoại & Laptop');
        $posts = Post::published()->latest('published_at')->paginate(12);
        return view('pages.blog', compact('posts'));
    }

    /**
     * Trang chi tiết bài viết
     */
    public function blogPost(Post $post)
    {
        SEOMeta::setTitle($post->meta_title ?: $post->title);
        SEOMeta::setDescription($post->meta_description ?: $post->excerpt);
        $post->increment('views');
        return view('pages.blog-post', compact('post'));
    }

    /**
     * Build JSON-LD Schema cho trang Dòng máy
     */
    private function buildDeviceSchema(DeviceModel $deviceModel, $repairs): array
    {
        $offers = $repairs->map(fn($r) => [
            '@type' => 'Offer',
            'name' => $r->serviceType->name . ' ' . $deviceModel->name,
            'price' => $r->sale_price ?? $r->price,
            'priceCurrency' => 'VND',
            'availability' => 'https://schema.org/InStock',
            'url' => url("/{$r->slug}"),
        ])->toArray();

        return [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => 'Dịch vụ sửa chữa ' . $deviceModel->name,
            'brand' => ['@type' => 'Brand', 'name' => $deviceModel->brand->name],
            'offers' => $offers,
        ];
    }

    /**
     * Build JSON-LD Schema cho trang Dịch vụ cụ thể
     */
    private function buildRepairSchema(Repair $repair): array
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Service',
                    'name' => $repair->serviceType->name . ' ' . $repair->deviceModel->name,
                    'provider' => [
                        '@type' => 'LocalBusiness',
                        'name' => 'Điện Thoại Laptop VN',
                        'url' => url('/'),
                    ],
                    'offers' => [
                        '@type' => 'Offer',
                        'price' => $repair->sale_price ?? $repair->price,
                        'priceCurrency' => 'VND',
                    ],
                ],
            ],
        ];

        // Thêm FAQ Schema nếu có
        if ($repair->faq && count($repair->faq) > 0) {
            $faqItems = collect($repair->faq)->map(fn($item) => [
                '@type' => 'Question',
                'name' => $item['question'] ?? '',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $item['answer'] ?? '',
                ],
            ])->toArray();

            $schema['@graph'][] = [
                '@type' => 'FAQPage',
                'mainEntity' => $faqItems,
            ];
        }

        return $schema;
    }
}
