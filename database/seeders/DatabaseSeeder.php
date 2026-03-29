<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\DeviceModel;
use App\Models\Repair;
use App\Models\ServiceType;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@dienthoailaptop.vn'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
            ]
        );

        // Settings
        $settings = [
            'site_name' => 'Sửa Điện Thoại Laptop - Uy Tín Giá Rẻ',
            'phone' => '0909.123.456',
            'phone_2' => '0912.345.678',
            'address' => '123 Nguyễn Văn Linh, Quận 7, TP.HCM',
            'email' => 'contact@dienthoailaptop.vn',
            'working_hours' => '8:00 - 21:00 (Cả CN & Lễ)',
            'zalo' => '0909123456',
            'facebook' => 'https://facebook.com/dienthoailaptop',
            'google_maps' => 'https://maps.google.com/?q=suadienthoailaptop',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }

        // Categories
        $suaDT = Category::create([
            'name' => 'Sửa Điện Thoại',
            'slug' => 'sua-dien-thoai',
            'description' => 'Dịch vụ sửa chữa điện thoại các hãng uy tín, lấy liền trong ngày',
            'icon' => 'heroicon-o-device-phone-mobile',
            'meta_title' => 'Sửa Điện Thoại Uy Tín Giá Rẻ - Lấy Liền',
            'meta_description' => 'Dịch vụ sửa chữa điện thoại iPhone, Samsung, Xiaomi uy tín. Thay màn hình, pin, sửa main board. Bảo hành dài hạn.',
            'sort_order' => 1,
        ]);

        $suaLaptop = Category::create([
            'name' => 'Sửa Laptop',
            'slug' => 'sua-laptop',
            'description' => 'Dịch vụ sửa chữa laptop Dell, HP, Macbook chuyên nghiệp',
            'icon' => 'heroicon-o-computer-desktop',
            'meta_title' => 'Sửa Laptop Chuyên Nghiệp - Giá Rẻ Lấy Liền',
            'meta_description' => 'Sửa laptop Dell, HP, Macbook, Lenovo. Thay màn hình, keyboard, pin laptop. Vệ sinh laptop tận nơi.',
            'sort_order' => 2,
        ]);

        // Brands
        $apple = Brand::create(['name' => 'Apple', 'slug' => 'apple', 'sort_order' => 1]);
        $samsung = Brand::create(['name' => 'Samsung', 'slug' => 'samsung', 'sort_order' => 2]);
        $xiaomi = Brand::create(['name' => 'Xiaomi', 'slug' => 'xiaomi', 'sort_order' => 3]);
        $oppo = Brand::create(['name' => 'OPPO', 'slug' => 'oppo', 'sort_order' => 4]);
        $dell = Brand::create(['name' => 'Dell', 'slug' => 'dell', 'sort_order' => 5]);
        $hp = Brand::create(['name' => 'HP', 'slug' => 'hp', 'sort_order' => 6]);
        $macbook = Brand::create(['name' => 'MacBook', 'slug' => 'macbook', 'sort_order' => 7]);

        // Attach brands to categories
        $suaDT->brands()->attach([$apple->id, $samsung->id, $xiaomi->id, $oppo->id]);
        $suaLaptop->brands()->attach([$dell->id, $hp->id, $macbook->id]);

        // Service Types
        $thayManHinh = ServiceType::create(['name' => 'Thay Màn Hình', 'slug' => 'thay-man-hinh', 'sort_order' => 1]);
        $thayPin = ServiceType::create(['name' => 'Thay Pin', 'slug' => 'thay-pin', 'sort_order' => 2]);
        $thayKinh = ServiceType::create(['name' => 'Thay Kính Lưng', 'slug' => 'thay-kinh-lung', 'sort_order' => 3]);
        $suaMain = ServiceType::create(['name' => 'Sửa Main Board', 'slug' => 'sua-main-board', 'sort_order' => 4]);
        $thayCamera = ServiceType::create(['name' => 'Thay Camera', 'slug' => 'thay-camera', 'sort_order' => 5]);
        $suaFaceID = ServiceType::create(['name' => 'Sửa Face ID', 'slug' => 'sua-face-id', 'sort_order' => 6]);

        // Device Models - iPhone
        $iphone15PM = DeviceModel::create([
            'brand_id' => $apple->id,
            'category_id' => $suaDT->id,
            'name' => 'iPhone 15 Pro Max', 'slug' => 'iphone-15-pro-max',
            'sort_order' => 1,
        ]);
        $iphone15P = DeviceModel::create([
            'brand_id' => $apple->id,
            'category_id' => $suaDT->id,
            'name' => 'iPhone 15 Pro', 'slug' => 'iphone-15-pro',
            'sort_order' => 2,
        ]);
        $iphone15 = DeviceModel::create([
            'brand_id' => $apple->id,
            'category_id' => $suaDT->id,
            'name' => 'iPhone 15', 'slug' => 'iphone-15',
            'sort_order' => 3,
        ]);
        $iphone14PM = DeviceModel::create([
            'brand_id' => $apple->id,
            'category_id' => $suaDT->id,
            'name' => 'iPhone 14 Pro Max', 'slug' => 'iphone-14-pro-max',
            'sort_order' => 4,
        ]);

        // Device Models - Samsung
        $s24Ultra = DeviceModel::create([
            'brand_id' => $samsung->id,
            'category_id' => $suaDT->id,
            'name' => 'Galaxy S24 Ultra', 'slug' => 'galaxy-s24-ultra',
            'sort_order' => 1,
        ]);
        $s24Plus = DeviceModel::create([
            'brand_id' => $samsung->id,
            'category_id' => $suaDT->id,
            'name' => 'Galaxy S24+', 'slug' => 'galaxy-s24-plus',
            'sort_order' => 2,
        ]);

        // Repairs - iPhone 15 Pro Max
        Repair::create([
            'device_model_id' => $iphone15PM->id,
            'service_type_id' => $thayManHinh->id,
            'price' => 4500000,
            'sale_price' => 3800000,
            'warranty' => '6 tháng',
            'repair_time' => '45 phút',
            'short_description' => 'Thay màn hình iPhone 15 Pro Max chính hãng, bảo hành 6 tháng',
            'is_featured' => true,
            'faq' => [
                ['question' => 'Thay màn hình iPhone 15 Pro Max mất bao lâu?', 'answer' => 'Thời gian thay màn hình iPhone 15 Pro Max khoảng 45-60 phút, khách hàng có thể ngồi đợi tại cửa hàng.'],
                ['question' => 'Màn hình thay có bảo hành không?', 'answer' => 'Có, chúng tôi bảo hành 6 tháng cho tất cả linh kiện thay thế.'],
                ['question' => 'Giá thay màn hình iPhone 15 Pro Max bao nhiêu?', 'answer' => 'Giá thay màn hình iPhone 15 Pro Max chỉ từ 3.800.000đ, đã bao gồm công thợ và linh kiện.'],
            ],
        ]);

        Repair::create([
            'device_model_id' => $iphone15PM->id,
            'service_type_id' => $thayPin->id,
            'price' => 850000,
            'sale_price' => 650000,
            'warranty' => '12 tháng',
            'repair_time' => '30 phút',
            'short_description' => 'Thay pin iPhone 15 Pro Max dung lượng cao, bảo hành 12 tháng',
            'is_featured' => true,
        ]);

        Repair::create([
            'device_model_id' => $iphone15PM->id,
            'service_type_id' => $thayKinh->id,
            'price' => 1200000,
            'sale_price' => 950000,
            'warranty' => '6 tháng',
            'repair_time' => '60 phút',
            'short_description' => 'Thay kính lưng iPhone 15 Pro Max nguyên bản',
        ]);

        // Repairs - iPhone 15 Pro
        Repair::create([
            'device_model_id' => $iphone15P->id,
            'service_type_id' => $thayManHinh->id,
            'price' => 3800000,
            'sale_price' => 3200000,
            'warranty' => '6 tháng',
            'repair_time' => '45 phút',
            'short_description' => 'Thay màn hình iPhone 15 Pro chính hãng',
            'is_featured' => true,
        ]);

        Repair::create([
            'device_model_id' => $iphone15P->id,
            'service_type_id' => $thayPin->id,
            'price' => 750000,
            'sale_price' => 600000,
            'warranty' => '12 tháng',
            'repair_time' => '30 phút',
            'short_description' => 'Thay pin iPhone 15 Pro',
        ]);

        // Repairs - Samsung Galaxy S24 Ultra
        Repair::create([
            'device_model_id' => $s24Ultra->id,
            'service_type_id' => $thayManHinh->id,
            'price' => 5200000,
            'sale_price' => 4500000,
            'warranty' => '6 tháng',
            'repair_time' => '60 phút',
            'short_description' => 'Thay màn hình Samsung Galaxy S24 Ultra AMOLED chính hãng',
            'is_featured' => true,
        ]);

        Repair::create([
            'device_model_id' => $s24Ultra->id,
            'service_type_id' => $thayPin->id,
            'price' => 900000,
            'sale_price' => 700000,
            'warranty' => '12 tháng',
            'repair_time' => '30 phút',
            'short_description' => 'Thay pin Samsung Galaxy S24 Ultra',
        ]);
    }
}
