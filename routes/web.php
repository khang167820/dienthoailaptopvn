<?php

use App\Http\Controllers\PageController;
use App\Models\Repair;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

/*
|--------------------------------------------------------------------------
| Frontend Routes - Chuẩn Silo SEO
|--------------------------------------------------------------------------
*/

// Trang chủ
Route::get('/', [PageController::class, 'home'])->name('home');

// Blog
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{post:slug}', [PageController::class, 'blogPost'])->name('blog.post');

// Sitemap XML động
Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create()
        ->add(Url::create('/')->setPriority(1.0)->setChangeFrequency('daily'));

    // Thêm tất cả danh mục
    \App\Models\Category::active()->get()->each(function ($cat) use ($sitemap) {
        $sitemap->add(Url::create("/{$cat->slug}")->setPriority(0.9)->setChangeFrequency('weekly'));
    });

    // Thêm tất cả trang dịch vụ (Landing Pages quan trọng nhất)
    Repair::active()->with(['deviceModel.brand', 'serviceType'])->get()->each(function ($repair) use ($sitemap) {
        $sitemap->add(Url::create("/{$repair->slug}")->setPriority(0.8)->setChangeFrequency('weekly'));
    });

    // Thêm blog posts
    \App\Models\Post::published()->get()->each(function ($post) use ($sitemap) {
        $sitemap->add(Url::create("/blog/{$post->slug}")->setPriority(0.6)->setChangeFrequency('monthly'));
    });

    return $sitemap->toResponse(request());
})->name('sitemap');

// Trang dịch vụ chi tiết (VD: /thay-man-hinh-iphone-15-pro-max)
// ĐẶT ROUTE NÀY CUỐI ĐỂ KHÔNG CONFLICT
Route::get('/{repair:slug}', [PageController::class, 'repair'])->name('repair');

// Danh mục (VD: /sua-dien-thoai)
Route::get('/{category:slug}', [PageController::class, 'category'])->name('category');

// Thương hiệu (VD: /sua-dien-thoai/apple)
Route::get('/{category:slug}/{brand:slug}', [PageController::class, 'brand'])->name('brand');

// Dòng máy (VD: /sua-dien-thoai/apple/iphone-15-pro-max)
Route::get('/{category:slug}/{brand:slug}/{deviceModel:slug}', [PageController::class, 'deviceModel'])->name('device-model');
