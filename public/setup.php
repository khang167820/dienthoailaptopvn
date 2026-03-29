<?php

/**
 * File tạm dùng để chạy migrate + tạo admin trên Hostinger
 * XÓA FILE NÀY NGAY SAU KHI CHẠY XONG!
 */

// Chỉ cho phép chạy 1 lần duy nhất
$lockFile = __DIR__ . '/../storage/setup.lock';
if (file_exists($lockFile)) {
    die('⛔ Setup đã chạy rồi. Xóa file này đi!');
}

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo '<pre style="font-family:monospace;background:#1e293b;color:#e2e8f0;padding:20px;border-radius:12px;font-size:14px;">';
echo "🚀 SETUP DIENTHOAILAPTOP.VN\n";
echo "================================\n\n";

// 1. Chạy migrate
echo "📦 Đang tạo Database...\n";
try {
    Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
    echo Illuminate\Support\Facades\Artisan::output();
    echo "✅ Migrate thành công!\n\n";
} catch (Exception $e) {
    echo "❌ Lỗi migrate: " . $e->getMessage() . "\n\n";
}

// 2. Tạo storage link
echo "🔗 Đang tạo Storage Link...\n";
try {
    Illuminate\Support\Facades\Artisan::call('storage:link', ['--force' => true]);
    echo "✅ Storage link OK!\n\n";
} catch (Exception $e) {
    echo "⚠️ Storage link: " . $e->getMessage() . "\n\n";
}

// 3. Tạo user Admin
echo "👤 Đang tạo tài khoản Admin...\n";
try {
    $user = \App\Models\User::updateOrCreate(
        ['email' => 'admin@dienthoailaptop.vn'],
        [
            'name' => 'Admin',
            'password' => bcrypt('admin123'),
        ]
    );
    echo "✅ Admin tạo thành công!\n";
    echo "   Email: admin@dienthoailaptop.vn\n";
    echo "   Password: admin123\n\n";
} catch (Exception $e) {
    echo "❌ Lỗi tạo admin: " . $e->getMessage() . "\n\n";
}

// 4. Clear cache
echo "🧹 Xóa cache...\n";
Illuminate\Support\Facades\Artisan::call('config:clear');
Illuminate\Support\Facades\Artisan::call('route:clear');
Illuminate\Support\Facades\Artisan::call('view:clear');
echo "✅ Cache đã xóa sạch!\n\n";

echo "================================\n";
echo "🎉 HOÀN TẤT! Website đã sẵn sàng!\n";
echo "🌐 Trang chủ: https://dienthoailaptop.vn\n";
echo "🔐 Trang Admin: https://dienthoailaptop.vn/admin\n\n";
echo "⚠️ HÃY XÓA FILE setup.php NGAY BÂY GIỜ!\n";

// Đánh dấu đã chạy
file_put_contents($lockFile, date('Y-m-d H:i:s'));
echo '</pre>';
