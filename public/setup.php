<?php

/**
 * File tạm dùng để chạy migrate + tạo admin trên Hostinger
 * XÓA FILE NÀY NGAY SAU KHI CHẠY XONG!
 */

$lockFile = __DIR__ . '/../storage/setup.lock';
if (file_exists($lockFile)) {
    die('⛔ Setup đã chạy rồi. Xóa file setup.lock trong storage/ nếu muốn chạy lại.');
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

// 2. Tạo storage link THỦ CÔNG (vì Hostinger chặn exec/symlink)
echo "🔗 Đang tạo Storage Link...\n";
$target = __DIR__ . '/../storage/app/public';
$link = __DIR__ . '/storage';
if (!file_exists($link)) {
    try {
        @symlink($target, $link);
        if (file_exists($link)) {
            echo "✅ Storage link OK (symlink)!\n\n";
        } else {
            // Nếu symlink bị chặn, tạo file .htaccess redirect
            @mkdir($link, 0755, true);
            file_put_contents($link . '/.htaccess', 'RewriteEngine On' . PHP_EOL . 'RewriteRule ^(.*)$ /storage/app/public/$1 [L]');
            echo "✅ Storage link OK (htaccess fallback)!\n\n";
        }
    } catch (Exception $e) {
        echo "⚠️ Storage link bị chặn, cần tạo thủ công: " . $e->getMessage() . "\n\n";
    }
} else {
    echo "✅ Storage link đã tồn tại!\n\n";
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

// 4. Clear cache (không dùng Artisan vì có thể lỗi exec)
echo "🧹 Xóa cache...\n";
try {
    // Xóa cache thủ công
    $cachePaths = [
        __DIR__ . '/../bootstrap/cache/config.php',
        __DIR__ . '/../bootstrap/cache/routes-v7.php',
        __DIR__ . '/../bootstrap/cache/services.php',
        __DIR__ . '/../bootstrap/cache/packages.php',
    ];
    foreach ($cachePaths as $path) {
        if (file_exists($path)) @unlink($path);
    }
    // Xóa view cache
    $viewCache = __DIR__ . '/../storage/framework/views/';
    if (is_dir($viewCache)) {
        foreach (glob($viewCache . '*.php') as $file) {
            @unlink($file);
        }
    }
    echo "✅ Cache đã xóa sạch!\n\n";
} catch (Exception $e) {
    echo "⚠️ Xóa cache: " . $e->getMessage() . "\n\n";
}

echo "================================\n";
echo "🎉 HOÀN TẤT! Website đã sẵn sàng!\n";
echo "🌐 Trang chủ: https://dienthoailaptop.vn\n";
echo "🔐 Trang Admin: https://dienthoailaptop.vn/admin\n\n";
echo "⚠️ HÃY XÓA FILE setup.php NGAY BÂY GIỜ!\n";

file_put_contents($lockFile, date('Y-m-d H:i:s'));
echo '</pre>';
