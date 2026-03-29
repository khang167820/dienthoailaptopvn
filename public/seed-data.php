<?php
/**
 * Script nhập dữ liệu mẫu cho website sửa chữa
 * XÓA SAU KHI CHẠY!
 */

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo '<pre style="font-family:monospace;background:#1e293b;color:#e2e8f0;padding:20px;border-radius:12px;font-size:14px;">';
echo "📦 NHẬP DỮ LIỆU MẪU\n";
echo "=====================\n\n";

// ==========================================
// 1. CATEGORIES
// ==========================================
echo "1️⃣ Tạo Danh mục...\n";
$categories = [
    ['name' => 'Sửa Điện Thoại', 'slug' => 'sua-dien-thoai', 'description' => 'Dịch vụ sửa chữa điện thoại các hãng uy tín, linh kiện chính hãng.', 'icon' => '📱', 'meta_title' => 'Sửa Điện Thoại Uy Tín | Điện Thoại Laptop VN', 'meta_description' => 'Dịch vụ sửa chữa điện thoại tất cả các hãng tại TP.HCM. Linh kiện zin 100%, bảo hành dài hạn.', 'sort_order' => 1, 'is_active' => true],
    ['name' => 'Sửa Laptop', 'slug' => 'sua-laptop', 'description' => 'Sửa chữa laptop các hãng Dell, HP, Asus, Macbook. Linh kiện chính hãng.', 'icon' => '💻', 'meta_title' => 'Sửa Laptop Uy Tín Tại TP.HCM | Điện Thoại Laptop VN', 'meta_description' => 'Dịch vụ sửa laptop Dell, HP, Asus, Macbook. Kỹ thuật viên giàu kinh nghiệm, sửa lấy liền.', 'sort_order' => 2, 'is_active' => true],
    ['name' => 'Sửa Tablet', 'slug' => 'sua-tablet', 'description' => 'Dịch vụ sửa chữa iPad, máy tính bảng Samsung Galaxy Tab các đời.', 'icon' => '📟', 'meta_title' => 'Sửa Tablet iPad Samsung | Điện Thoại Laptop VN', 'meta_description' => 'Sửa chữa iPad, Samsung Galaxy Tab. Thay màn hình, pin, sửa lỗi phần mềm.', 'sort_order' => 3, 'is_active' => true],
];
foreach ($categories as $c) {
    $c['created_at'] = $c['updated_at'] = now();
    DB::table('categories')->updateOrInsert(['slug' => $c['slug']], $c);
}
echo "   ✅ " . count($categories) . " danh mục\n\n";

// ==========================================
// 2. BRANDS
// ==========================================
echo "2️⃣ Tạo Thương hiệu...\n";
$brands = [
    ['name' => 'Apple', 'slug' => 'apple', 'description' => 'iPhone, iPad, Macbook - Sửa chữa chính hãng Apple', 'meta_title' => 'Sửa Chữa Apple iPhone iPad Macbook', 'sort_order' => 1],
    ['name' => 'Samsung', 'slug' => 'samsung', 'description' => 'Samsung Galaxy, Galaxy Tab - Sửa chữa uy tín', 'meta_title' => 'Sửa Chữa Samsung Galaxy', 'sort_order' => 2],
    ['name' => 'Xiaomi', 'slug' => 'xiaomi', 'description' => 'Xiaomi Redmi, POCO - Linh kiện chính hãng', 'meta_title' => 'Sửa Chữa Xiaomi Redmi POCO', 'sort_order' => 3],
    ['name' => 'OPPO', 'slug' => 'oppo', 'description' => 'OPPO Find, Reno - Sửa chữa giá tốt', 'meta_title' => 'Sửa Chữa OPPO Find Reno', 'sort_order' => 4],
    ['name' => 'Dell', 'slug' => 'dell', 'description' => 'Dell Inspiron, XPS, Latitude - Sửa laptop Dell', 'meta_title' => 'Sửa Laptop Dell', 'sort_order' => 5],
    ['name' => 'HP', 'slug' => 'hp', 'description' => 'HP Pavilion, Elitebook, ProBook - Sửa laptop HP', 'meta_title' => 'Sửa Laptop HP', 'sort_order' => 6],
    ['name' => 'Asus', 'slug' => 'asus', 'description' => 'Asus VivoBook, ROG, ZenBook - Sửa laptop Asus', 'meta_title' => 'Sửa Laptop Asus', 'sort_order' => 7],
    ['name' => 'Lenovo', 'slug' => 'lenovo', 'description' => 'Lenovo ThinkPad, IdeaPad, Legion - Sửa laptop Lenovo', 'meta_title' => 'Sửa Laptop Lenovo', 'sort_order' => 8],
];
foreach ($brands as $b) {
    $b['is_active'] = true;
    $b['created_at'] = $b['updated_at'] = now();
    DB::table('brands')->updateOrInsert(['slug' => $b['slug']], $b);
}
echo "   ✅ " . count($brands) . " thương hiệu\n\n";

// ==========================================
// 3. BRAND-CATEGORY PIVOT
// ==========================================
echo "3️⃣ Liên kết Thương hiệu - Danh mục...\n";
$catIds = DB::table('categories')->pluck('id', 'slug');
$brandIds = DB::table('brands')->pluck('id', 'slug');

$pivots = [
    ['apple', 'sua-dien-thoai'], ['apple', 'sua-tablet'], ['apple', 'sua-laptop'],
    ['samsung', 'sua-dien-thoai'], ['samsung', 'sua-tablet'],
    ['xiaomi', 'sua-dien-thoai'], ['oppo', 'sua-dien-thoai'],
    ['dell', 'sua-laptop'], ['hp', 'sua-laptop'], ['asus', 'sua-laptop'], ['lenovo', 'sua-laptop'],
];
foreach ($pivots as [$brand, $cat]) {
    if (isset($brandIds[$brand]) && isset($catIds[$cat])) {
        DB::table('brand_category')->updateOrInsert([
            'brand_id' => $brandIds[$brand],
            'category_id' => $catIds[$cat],
        ]);
    }
}
echo "   ✅ " . count($pivots) . " liên kết\n\n";

// ==========================================
// 4. DEVICE MODELS
// ==========================================
echo "4️⃣ Tạo Dòng máy...\n";
$devices = [
    // iPhone
    ['brand' => 'apple', 'cat' => 'sua-dien-thoai', 'name' => 'iPhone 16 Pro Max', 'slug' => 'iphone-16-pro-max'],
    ['brand' => 'apple', 'cat' => 'sua-dien-thoai', 'name' => 'iPhone 16 Pro', 'slug' => 'iphone-16-pro'],
    ['brand' => 'apple', 'cat' => 'sua-dien-thoai', 'name' => 'iPhone 16', 'slug' => 'iphone-16'],
    ['brand' => 'apple', 'cat' => 'sua-dien-thoai', 'name' => 'iPhone 15 Pro Max', 'slug' => 'iphone-15-pro-max'],
    ['brand' => 'apple', 'cat' => 'sua-dien-thoai', 'name' => 'iPhone 15 Pro', 'slug' => 'iphone-15-pro'],
    ['brand' => 'apple', 'cat' => 'sua-dien-thoai', 'name' => 'iPhone 15', 'slug' => 'iphone-15'],
    ['brand' => 'apple', 'cat' => 'sua-dien-thoai', 'name' => 'iPhone 14 Pro Max', 'slug' => 'iphone-14-pro-max'],
    ['brand' => 'apple', 'cat' => 'sua-dien-thoai', 'name' => 'iPhone 14', 'slug' => 'iphone-14'],
    ['brand' => 'apple', 'cat' => 'sua-dien-thoai', 'name' => 'iPhone 13', 'slug' => 'iphone-13'],
    // Samsung
    ['brand' => 'samsung', 'cat' => 'sua-dien-thoai', 'name' => 'Samsung Galaxy S25 Ultra', 'slug' => 'samsung-galaxy-s25-ultra'],
    ['brand' => 'samsung', 'cat' => 'sua-dien-thoai', 'name' => 'Samsung Galaxy S25', 'slug' => 'samsung-galaxy-s25'],
    ['brand' => 'samsung', 'cat' => 'sua-dien-thoai', 'name' => 'Samsung Galaxy S24 Ultra', 'slug' => 'samsung-galaxy-s24-ultra'],
    ['brand' => 'samsung', 'cat' => 'sua-dien-thoai', 'name' => 'Samsung Galaxy Z Fold 6', 'slug' => 'samsung-galaxy-z-fold-6'],
    ['brand' => 'samsung', 'cat' => 'sua-dien-thoai', 'name' => 'Samsung Galaxy Z Flip 6', 'slug' => 'samsung-galaxy-z-flip-6'],
    ['brand' => 'samsung', 'cat' => 'sua-dien-thoai', 'name' => 'Samsung Galaxy A55', 'slug' => 'samsung-galaxy-a55'],
    // Xiaomi
    ['brand' => 'xiaomi', 'cat' => 'sua-dien-thoai', 'name' => 'Xiaomi 14 Ultra', 'slug' => 'xiaomi-14-ultra'],
    ['brand' => 'xiaomi', 'cat' => 'sua-dien-thoai', 'name' => 'Xiaomi Redmi Note 13 Pro', 'slug' => 'xiaomi-redmi-note-13-pro'],
    ['brand' => 'xiaomi', 'cat' => 'sua-dien-thoai', 'name' => 'POCO X6 Pro', 'slug' => 'poco-x6-pro'],
    // OPPO
    ['brand' => 'oppo', 'cat' => 'sua-dien-thoai', 'name' => 'OPPO Find X7 Ultra', 'slug' => 'oppo-find-x7-ultra'],
    ['brand' => 'oppo', 'cat' => 'sua-dien-thoai', 'name' => 'OPPO Reno 11 Pro', 'slug' => 'oppo-reno-11-pro'],
    // iPad
    ['brand' => 'apple', 'cat' => 'sua-tablet', 'name' => 'iPad Pro M4', 'slug' => 'ipad-pro-m4'],
    ['brand' => 'apple', 'cat' => 'sua-tablet', 'name' => 'iPad Air M2', 'slug' => 'ipad-air-m2'],
    ['brand' => 'apple', 'cat' => 'sua-tablet', 'name' => 'iPad Gen 10', 'slug' => 'ipad-gen-10'],
    // Samsung Tablet
    ['brand' => 'samsung', 'cat' => 'sua-tablet', 'name' => 'Samsung Galaxy Tab S9 Ultra', 'slug' => 'samsung-galaxy-tab-s9-ultra'],
    // Laptop
    ['brand' => 'apple', 'cat' => 'sua-laptop', 'name' => 'MacBook Pro M3', 'slug' => 'macbook-pro-m3'],
    ['brand' => 'apple', 'cat' => 'sua-laptop', 'name' => 'MacBook Air M3', 'slug' => 'macbook-air-m3'],
    ['brand' => 'dell', 'cat' => 'sua-laptop', 'name' => 'Dell XPS 15', 'slug' => 'dell-xps-15'],
    ['brand' => 'dell', 'cat' => 'sua-laptop', 'name' => 'Dell Inspiron 15', 'slug' => 'dell-inspiron-15'],
    ['brand' => 'hp', 'cat' => 'sua-laptop', 'name' => 'HP Pavilion 15', 'slug' => 'hp-pavilion-15'],
    ['brand' => 'hp', 'cat' => 'sua-laptop', 'name' => 'HP EliteBook 840', 'slug' => 'hp-elitebook-840'],
    ['brand' => 'asus', 'cat' => 'sua-laptop', 'name' => 'Asus VivoBook 15', 'slug' => 'asus-vivobook-15'],
    ['brand' => 'asus', 'cat' => 'sua-laptop', 'name' => 'Asus ROG Zephyrus', 'slug' => 'asus-rog-zephyrus'],
    ['brand' => 'lenovo', 'cat' => 'sua-laptop', 'name' => 'Lenovo ThinkPad X1 Carbon', 'slug' => 'lenovo-thinkpad-x1-carbon'],
    ['brand' => 'lenovo', 'cat' => 'sua-laptop', 'name' => 'Lenovo IdeaPad 5', 'slug' => 'lenovo-ideapad-5'],
];
foreach ($devices as $d) {
    DB::table('device_models')->updateOrInsert(
        ['slug' => $d['slug']],
        [
            'brand_id' => $brandIds[$d['brand']],
            'category_id' => $catIds[$d['cat']],
            'name' => $d['name'],
            'slug' => $d['slug'],
            'meta_title' => 'Sửa chữa ' . $d['name'] . ' | Điện Thoại Laptop VN',
            'meta_description' => 'Dịch vụ sửa chữa ' . $d['name'] . ' uy tín tại TP.HCM. Linh kiện chính hãng, bảo hành dài hạn.',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]
    );
}
echo "   ✅ " . count($devices) . " dòng máy\n\n";

// ==========================================
// 5. SERVICE TYPES
// ==========================================
echo "5️⃣ Tạo Loại dịch vụ...\n";
$serviceTypes = [
    ['name' => 'Thay Màn Hình', 'slug' => 'thay-man-hinh', 'icon' => '🖥️', 'description' => 'Thay màn hình chính hãng, hiển thị sắc nét như mới.'],
    ['name' => 'Thay Pin', 'slug' => 'thay-pin', 'icon' => '🔋', 'description' => 'Thay pin dung lượng cao, bảo hành 12 tháng.'],
    ['name' => 'Thay Mặt Kính', 'slug' => 'thay-mat-kinh', 'icon' => '🔲', 'description' => 'Thay mặt kính cảm ứng, giữ nguyên màn hình gốc.'],
    ['name' => 'Sửa Face ID', 'slug' => 'sua-face-id', 'icon' => '👤', 'description' => 'Sửa lỗi Face ID không nhận diện, khôi phục bảo mật.'],
    ['name' => 'Thay Camera', 'slug' => 'thay-camera', 'icon' => '📷', 'description' => 'Thay camera trước/sau chính hãng.'],
    ['name' => 'Sửa Loa - Mic', 'slug' => 'sua-loa-mic', 'icon' => '🔊', 'description' => 'Sửa loa ngoài, loa trong, micro bị hư.'],
    ['name' => 'Thay Vỏ', 'slug' => 'thay-vo', 'icon' => '🛡️', 'description' => 'Thay vỏ máy mới, many màu sắc lựa chọn.'],
    ['name' => 'Cài Đặt Phần Mềm', 'slug' => 'cai-dat-phan-mem', 'icon' => '⚙️', 'description' => 'Cài đặt lại hệ điều hành, phần mềm, driver.'],
    ['name' => 'Thay Bàn Phím', 'slug' => 'thay-ban-phim', 'icon' => '⌨️', 'description' => 'Thay bàn phím laptop bị liệt, kẹt phím.'],
    ['name' => 'Vệ Sinh Máy', 'slug' => 've-sinh-may', 'icon' => '🧹', 'description' => 'Vệ sinh quạt tản nhiệt, thay keo tản nhiệt.'],
];
foreach ($serviceTypes as $s) {
    $s['is_active'] = true;
    $s['created_at'] = $s['updated_at'] = now();
    DB::table('service_types')->updateOrInsert(['slug' => $s['slug']], $s);
}
echo "   ✅ " . count($serviceTypes) . " loại dịch vụ\n\n";

// ==========================================
// 6. REPAIRS (Dịch vụ chi tiết)
// ==========================================
echo "6️⃣ Tạo Dịch vụ sửa chữa chi tiết...\n";
$deviceIds = DB::table('device_models')->pluck('id', 'slug');
$stIds = DB::table('service_types')->pluck('id', 'slug');

$repairData = [
    // iPhone 16 Pro Max
    ['device' => 'iphone-16-pro-max', 'service' => 'thay-man-hinh', 'price' => 6500000, 'sale' => 5900000, 'warranty' => '6 tháng', 'time' => '45 phút'],
    ['device' => 'iphone-16-pro-max', 'service' => 'thay-pin', 'price' => 1200000, 'sale' => 990000, 'warranty' => '12 tháng', 'time' => '30 phút'],
    ['device' => 'iphone-16-pro-max', 'service' => 'thay-mat-kinh', 'price' => 2500000, 'sale' => 2200000, 'warranty' => '6 tháng', 'time' => '60 phút'],
    ['device' => 'iphone-16-pro-max', 'service' => 'sua-face-id', 'price' => 3500000, 'sale' => 2900000, 'warranty' => '3 tháng', 'time' => '90 phút'],
    ['device' => 'iphone-16-pro-max', 'service' => 'thay-camera', 'price' => 3000000, 'sale' => 2500000, 'warranty' => '6 tháng', 'time' => '45 phút'],
    // iPhone 15 Pro Max
    ['device' => 'iphone-15-pro-max', 'service' => 'thay-man-hinh', 'price' => 5500000, 'sale' => 4900000, 'warranty' => '6 tháng', 'time' => '45 phút'],
    ['device' => 'iphone-15-pro-max', 'service' => 'thay-pin', 'price' => 990000, 'sale' => 790000, 'warranty' => '12 tháng', 'time' => '30 phút'],
    ['device' => 'iphone-15-pro-max', 'service' => 'sua-face-id', 'price' => 3000000, 'sale' => 2500000, 'warranty' => '3 tháng', 'time' => '90 phút'],
    // iPhone 15 Pro
    ['device' => 'iphone-15-pro', 'service' => 'thay-man-hinh', 'price' => 4800000, 'sale' => 4200000, 'warranty' => '6 tháng', 'time' => '45 phút'],
    ['device' => 'iphone-15-pro', 'service' => 'thay-pin', 'price' => 890000, 'sale' => 690000, 'warranty' => '12 tháng', 'time' => '30 phút'],
    // Samsung Galaxy S25 Ultra  
    ['device' => 'samsung-galaxy-s25-ultra', 'service' => 'thay-man-hinh', 'price' => 7500000, 'sale' => 6900000, 'warranty' => '6 tháng', 'time' => '60 phút'],
    ['device' => 'samsung-galaxy-s25-ultra', 'service' => 'thay-pin', 'price' => 1100000, 'sale' => 890000, 'warranty' => '12 tháng', 'time' => '30 phút'],
    ['device' => 'samsung-galaxy-s25-ultra', 'service' => 'thay-mat-kinh', 'price' => 3200000, 'sale' => 2800000, 'warranty' => '6 tháng', 'time' => '60 phút'],
    // Samsung Z Fold 6
    ['device' => 'samsung-galaxy-z-fold-6', 'service' => 'thay-man-hinh', 'price' => 12000000, 'sale' => 10500000, 'warranty' => '6 tháng', 'time' => '90 phút'],
    ['device' => 'samsung-galaxy-z-fold-6', 'service' => 'thay-pin', 'price' => 1500000, 'sale' => 1200000, 'warranty' => '12 tháng', 'time' => '45 phút'],
    // MacBook Pro
    ['device' => 'macbook-pro-m3', 'service' => 'thay-man-hinh', 'price' => 15000000, 'sale' => 13500000, 'warranty' => '6 tháng', 'time' => '120 phút'],
    ['device' => 'macbook-pro-m3', 'service' => 'thay-pin', 'price' => 3500000, 'sale' => 2900000, 'warranty' => '12 tháng', 'time' => '60 phút'],
    ['device' => 'macbook-pro-m3', 'service' => 'thay-ban-phim', 'price' => 4500000, 'sale' => 3900000, 'warranty' => '6 tháng', 'time' => '90 phút'],
    ['device' => 'macbook-pro-m3', 'service' => 've-sinh-may', 'price' => 500000, 'sale' => 350000, 'warranty' => '1 tháng', 'time' => '45 phút'],
    // Dell XPS 15
    ['device' => 'dell-xps-15', 'service' => 'thay-man-hinh', 'price' => 6000000, 'sale' => 5200000, 'warranty' => '6 tháng', 'time' => '90 phút'],
    ['device' => 'dell-xps-15', 'service' => 'thay-pin', 'price' => 1800000, 'sale' => 1500000, 'warranty' => '12 tháng', 'time' => '45 phút'],
    ['device' => 'dell-xps-15', 'service' => 'thay-ban-phim', 'price' => 2200000, 'sale' => 1800000, 'warranty' => '6 tháng', 'time' => '60 phút'],
    ['device' => 'dell-xps-15', 'service' => 've-sinh-may', 'price' => 350000, 'sale' => 250000, 'warranty' => '1 tháng', 'time' => '30 phút'],
    // OPPO Find X7 Ultra
    ['device' => 'oppo-find-x7-ultra', 'service' => 'thay-man-hinh', 'price' => 4500000, 'sale' => 3900000, 'warranty' => '6 tháng', 'time' => '60 phút'],
    ['device' => 'oppo-find-x7-ultra', 'service' => 'thay-pin', 'price' => 800000, 'sale' => 650000, 'warranty' => '12 tháng', 'time' => '30 phút'],
    // Xiaomi 14 Ultra
    ['device' => 'xiaomi-14-ultra', 'service' => 'thay-man-hinh', 'price' => 3800000, 'sale' => 3200000, 'warranty' => '6 tháng', 'time' => '45 phút'],
    ['device' => 'xiaomi-14-ultra', 'service' => 'thay-pin', 'price' => 700000, 'sale' => 550000, 'warranty' => '12 tháng', 'time' => '30 phút'],
];

$repairCount = 0;
foreach ($repairData as $r) {
    if (!isset($deviceIds[$r['device']]) || !isset($stIds[$r['service']])) continue;
    
    $deviceName = DB::table('device_models')->where('slug', $r['device'])->value('name');
    $serviceName = DB::table('service_types')->where('slug', $r['service'])->value('name');
    $slug = $r['service'] . '-' . $r['device'];
    
    $faq = json_encode([
        ['question' => $serviceName . ' ' . $deviceName . ' giá bao nhiêu?', 'answer' => 'Giá ' . strtolower($serviceName) . ' ' . $deviceName . ' tại Điện Thoại Laptop VN chỉ từ ' . number_format($r['sale']) . 'đ. Bảo hành ' . $r['warranty'] . '.'],
        ['question' => $serviceName . ' ' . $deviceName . ' mất bao lâu?', 'answer' => 'Thời gian ' . strtolower($serviceName) . ' ' . $deviceName . ' chỉ khoảng ' . $r['time'] . '. Sửa lấy liền, khách hàng có thể chờ tại chỗ.'],
        ['question' => 'Có bảo hành sau khi ' . strtolower($serviceName) . ' không?', 'answer' => 'Có! Chúng tôi bảo hành ' . $r['warranty'] . ' cho dịch vụ ' . strtolower($serviceName) . ' ' . $deviceName . '. Cam kết linh kiện chính hãng.'],
    ], JSON_UNESCAPED_UNICODE);
    
    DB::table('repairs')->updateOrInsert(
        ['slug' => $slug],
        [
            'device_model_id' => $deviceIds[$r['device']],
            'service_type_id' => $stIds[$r['service']],
            'slug' => $slug,
            'price' => $r['price'],
            'sale_price' => $r['sale'],
            'warranty' => $r['warranty'],
            'repair_time' => $r['time'],
            'short_description' => 'Dịch vụ ' . strtolower($serviceName) . ' ' . $deviceName . ' chính hãng tại TP.HCM. Bảo hành ' . $r['warranty'] . ', sửa lấy liền trong ' . $r['time'] . '.',
            'content' => '<h2>' . $serviceName . ' ' . $deviceName . '</h2><p>Tại Điện Thoại Laptop VN, chúng tôi cung cấp dịch vụ ' . strtolower($serviceName) . ' ' . $deviceName . ' với linh kiện chính hãng, bảo hành ' . $r['warranty'] . '.</p><h3>Tại sao chọn chúng tôi?</h3><ul><li>Linh kiện zin 100% nhập khẩu trực tiếp</li><li>Kỹ thuật viên có trên 5 năm kinh nghiệm</li><li>Sửa lấy liền chỉ trong ' . $r['time'] . '</li><li>Bảo hành dài hạn ' . $r['warranty'] . '</li><li>Cam kết giá tốt nhất thị trường</li></ul><h3>Quy trình sửa chữa</h3><ol><li>Tiếp nhận máy, kiểm tra và báo giá miễn phí</li><li>Khách hàng đồng ý giá thì tiến hành sửa chữa</li><li>Kỹ thuật viên thực hiện thay thế linh kiện</li><li>Kiểm tra chất lượng, bàn giao máy và phiếu bảo hành</li></ol>',
            'meta_title' => $serviceName . ' ' . $deviceName . ' Giá Bao Nhiêu? [Bảng Giá ' . date('Y') . ']',
            'meta_description' => $serviceName . ' ' . $deviceName . ' giá chỉ từ ' . number_format($r['sale']) . 'đ. Linh kiện zin, bảo hành ' . $r['warranty'] . ', sửa lấy liền ' . $r['time'] . ' tại TP.HCM.',
            'faq' => $faq,
            'is_featured' => $r['sale'] > 3000000,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]
    );
    $repairCount++;
}
echo "   ✅ $repairCount dịch vụ sửa chữa chi tiết\n\n";

// ==========================================
// 7. BLOG POSTS
// ==========================================
echo "7️⃣ Tạo Bài viết Blog...\n";
$posts = [
    [
        'title' => 'Cách nhận biết màn hình iPhone chính hãng và hàng fake',
        'slug' => 'cach-nhan-biet-man-hinh-iphone-chinh-hang',
        'excerpt' => 'Hướng dẫn chi tiết cách phân biệt màn hình iPhone zin và hàng nhái, tránh bị lừa khi thay màn hình.',
        'content' => '<h2>Cách nhận biết màn hình iPhone chính hãng</h2><p>Khi thay màn hình iPhone, việc quan trọng nhất là phải đảm bảo linh kiện được sử dụng là hàng chính hãng. Bài viết này sẽ hướng dẫn bạn cách nhận biết.</p><h3>1. Kiểm tra True Tone</h3><p>Màn hình iPhone chính hãng sẽ giữ được tính năng True Tone sau khi thay. Nếu True Tone bị mất, khả năng cao màn hình là hàng nhái.</p><h3>2. Kiểm tra độ sáng tối đa</h3><p>Màn hình zin có độ sáng tối đa cao hơn hẳn so với hàng fake. Bạn có thể kiểm tra bằng cách kéo thanh sáng lên tối đa.</p><h3>3. Màu sắc và góc nhìn</h3><p>Màn hình chính hãng có màu sắc chính xác, góc nhìn rộng. Hàng fake thường bị ám vàng hoặc xanh.</p><h3>4. Cảm ứng 3D Touch / Haptic Touch</h3><p>Kiểm tra độ nhạy cảm ứng, đặc biệt là ở các mép cạnh màn hình.</p><h3>Kết luận</h3><p>Hãy đến các cửa hàng uy tín để thay màn hình iPhone, tránh mua phải hàng fake chất lượng kém.</p>',
        'category_id' => $catIds['sua-dien-thoai'],
    ],
    [
        'title' => 'iPhone bị chai pin: Nguyên nhân và cách khắc phục hiệu quả',
        'slug' => 'iphone-bi-chai-pin-nguyen-nhan-cach-khac-phuc',
        'excerpt' => 'Tìm hiểu nguyên nhân khiến pin iPhone bị chai và những giải pháp khắc phục tốt nhất.',
        'content' => '<h2>iPhone bị chai pin: Nguyên nhân và giải pháp</h2><p>Pin iPhone bị chai là tình trạng phổ biến sau 1-2 năm sử dụng. Bài viết này sẽ giúp bạn hiểu rõ nguyên nhân và cách xử lý.</p><h3>Nguyên nhân chai pin</h3><ul><li>Sạc qua đêm thường xuyên</li><li>Sử dụng sạc không chính hãng</li><li>Chơi game nặng trong khi sạc</li><li>Nhiệt độ môi trường quá cao</li></ul><h3>Dấu hiệu nhận biết</h3><ul><li>Pin tụt nhanh bất thường</li><li>iPhone tự tắt nguồn khi còn pin</li><li>Battery Health dưới 80%</li></ul><h3>Giải pháp</h3><p>Khi Battery Health xuống dưới 80%, bạn nên thay pin mới để đảm bảo trải nghiệm sử dụng tốt nhất.</p>',
        'category_id' => $catIds['sua-dien-thoai'],
    ],
    [
        'title' => 'Top 5 lỗi thường gặp trên laptop và cách sửa tại nhà',
        'slug' => 'top-5-loi-thuong-gap-tren-laptop-cach-sua',
        'excerpt' => '5 lỗi laptop phổ biến nhất mà bạn có thể tự khắc phục tại nhà trước khi mang ra tiệm.',
        'content' => '<h2>5 Lỗi laptop thường gặp</h2><h3>1. Laptop chạy chậm</h3><p>Nguyên nhân: RAM đầy, ổ cứng bị phân mảnh, nhiều ứng dụng khởi động cùng Windows.</p><p>Giải pháp: Dọn dẹp ổ cứng, tắt ứng dụng không cần thiết, nâng cấp SSD.</p><h3>2. Laptop nóng bất thường</h3><p>Nguyên nhân: Quạt tản nhiệt bị bám bụi, keo tản nhiệt khô.</p><p>Giải pháp: Vệ sinh quạt, thay keo tản nhiệt (nên mang ra tiệm).</p><h3>3. Màn hình bị sọc</h3><p>Nguyên nhân: Cáp màn hình lỏng hoặc panel LCD bị hỏng.</p><h3>4. Bàn phím liệt phím</h3><p>Nguyên nhân: Bụi bẩn lọt vào, đổ nước, hỏng mạch.</p><h3>5. Wifi không kết nối được</h3><p>Nguyên nhân: Driver wifi lỗi, card wifi hỏng.</p>',
        'category_id' => $catIds['sua-laptop'],
    ],
    [
        'title' => 'So sánh chi phí thay màn hình Samsung Galaxy Z Fold vs iPhone',
        'slug' => 'so-sanh-chi-phi-thay-man-hinh-samsung-z-fold-vs-iphone',
        'excerpt' => 'Phân tích chi phí thay màn hình giữa Samsung Galaxy Z Fold 6 và iPhone 16 Pro Max.',
        'content' => '<h2>So sánh chi phí thay màn hình</h2><p>Màn hình là linh kiện đắt nhất trên điện thoại. Bài viết này so sánh chi phí thay màn hình giữa dòng Galaxy Z Fold và iPhone.</p><h3>Samsung Galaxy Z Fold 6</h3><ul><li>Màn hình chính (bên trong): 10-12 triệu đồng</li><li>Màn hình phụ (bên ngoài): 3-4 triệu đồng</li></ul><h3>iPhone 16 Pro Max</h3><ul><li>Màn hình OLED: 5-6.5 triệu đồng</li></ul><h3>Kết luận</h3><p>Chi phí thay màn hình Z Fold đắt gần gấp đôi iPhone do cấu trúc gập phức tạp. Hãy bảo vệ máy bằng ốp lưng và kính cường lực.</p>',
        'category_id' => $catIds['sua-dien-thoai'],
    ],
    [
        'title' => 'Face ID bị hỏng sau khi thay màn hình iPhone: Giải pháp',
        'slug' => 'face-id-bi-hong-sau-khi-thay-man-hinh-iphone',
        'excerpt' => 'Tại sao Face ID hay bị lỗi sau khi thay màn hình và cách sửa chữa đúng cách.',
        'content' => '<h2>Face ID lỗi sau thay màn hình</h2><p>Nhiều cửa hàng sửa chữa không có kỹ thuật chuyên sâu dẫn đến Face ID bị hỏng sau khi thay màn hình. Bài viết này giải thích nguyên nhân và giải pháp.</p><h3>Nguyên nhân</h3><ul><li>Cảm biến Face ID bị tách rời khỏi màn hình cũ không đúng cách</li><li>Sử dụng nhiệt độ quá cao khi tháo lắp</li><li>Cáp flex Face ID bị đứt</li></ul><h3>Giải pháp</h3><p>Cần chọn cửa hàng có kỹ thuật viên chuyên sửa Face ID, có thiết bị chuyên dụng để tách và gắn cụm cảm biến.</p>',
        'category_id' => $catIds['sua-dien-thoai'],
    ],
    [
        'title' => 'Hướng dẫn vệ sinh laptop đúng cách tại nhà',
        'slug' => 'huong-dan-ve-sinh-laptop-dung-cach-tai-nha',
        'excerpt' => 'Hướng dẫn từng bước vệ sinh laptop an toàn, giúp máy chạy mát và bền hơn.',
        'content' => '<h2>Vệ sinh laptop tại nhà</h2><p>Vệ sinh laptop định kỳ giúp máy hoạt động mát hơn, kéo dài tuổi thọ.</p><h3>Dụng cụ cần chuẩn bị</h3><ul><li>Bình xịt khí nén</li><li>Cọ mềm</li><li>Khăn microfiber</li><li>Dung dịch vệ sinh màn hình</li></ul><h3>Các bước thực hiện</h3><ol><li>Tắt máy, rút nguồn và pin (nếu được)</li><li>Dùng bình khí nén xịt sạch bụi ở khe tản nhiệt</li><li>Dùng cọ mềm quét sạch bàn phím</li><li>Lau màn hình bằng khăn microfiber ẩm</li></ol><h3>Lưu ý quan trọng</h3><p>Không dùng nước trực tiếp, không xịt trực tiếp vào màn hình. Nếu máy quá nóng, nên mang đến tiệm để vệ sinh chuyên sâu.</p>',
        'category_id' => $catIds['sua-laptop'],
    ],
];

foreach ($posts as $p) {
    $p['status'] = 'published';
    $p['published_at'] = now()->subDays(rand(1, 30));
    $p['meta_title'] = $p['title'] . ' | Điện Thoại Laptop VN';
    $p['meta_description'] = $p['excerpt'];
    $p['views'] = rand(150, 2500);
    $p['created_at'] = $p['updated_at'] = now();
    DB::table('posts')->updateOrInsert(['slug' => $p['slug']], $p);
}
echo "   ✅ " . count($posts) . " bài blog\n\n";

echo "================================\n";
echo "🎉 HOÀN TẤT NHẬP DỮ LIỆU MẪU!\n\n";
echo "📊 Tổng kết:\n";
echo "   • " . count($categories) . " Danh mục\n";
echo "   • " . count($brands) . " Thương hiệu\n";
echo "   • " . count($devices) . " Dòng máy\n";
echo "   • " . count($serviceTypes) . " Loại dịch vụ\n";
echo "   • $repairCount Dịch vụ sửa chữa chi tiết\n";
echo "   • " . count($posts) . " Bài blog\n\n";
echo "🔗 Test các trang:\n";
echo "   • Trang chủ: https://dienthoailaptop.vn\n";
echo "   • Sửa ĐT: https://dienthoailaptop.vn/sua-dien-thoai\n";
echo "   • Apple: https://dienthoailaptop.vn/sua-dien-thoai/apple\n";
echo "   • iPhone 16 PM: https://dienthoailaptop.vn/sua-dien-thoai/apple/iphone-16-pro-max\n";
echo "   • Thay MH: https://dienthoailaptop.vn/thay-man-hinh-iphone-16-pro-max\n";
echo "   • Blog: https://dienthoailaptop.vn/blog\n\n";
echo "⚠️ XÓA FILE seed-data.php NGAY!\n";
echo '</pre>';
