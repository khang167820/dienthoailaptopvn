<?php

/**
 * Script tối ưu tốc độ Production cho Hostinger
 * XÓA SAU KHI CHẠY!
 */

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo '<pre style="font-family:monospace;background:#1e293b;color:#e2e8f0;padding:20px;border-radius:12px;font-size:14px;">';
echo "⚡ TỐI ƯU TỐC ĐỘ PRODUCTION\n";
echo "================================\n\n";

// 0. Xóa toàn bộ cache cũ trước
echo "0️⃣ Xóa cache cũ...\n";
try {
    Illuminate\Support\Facades\Artisan::call('optimize:clear');
    echo "   ✅ Cache cũ đã xóa!\n\n";
} catch (Exception $e) {
    echo "   ⚠️ " . $e->getMessage() . "\n\n";
}

// Xóa cache file thủ công
$cacheDir = __DIR__ . '/../storage/framework/cache/data/';
if (is_dir($cacheDir)) {
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($cacheDir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($files as $file) {
        if ($file->isFile()) @unlink($file->getRealPath());
    }
    echo "   ✅ File cache đã xóa!\n\n";
}

// 1. Cache Config
echo "1️⃣ Cache Config...\n";
try {
    Illuminate\Support\Facades\Artisan::call('config:cache');
    echo "   ✅ Config cached!\n\n";
} catch (Exception $e) {
    echo "   ⚠️ " . $e->getMessage() . "\n\n";
}

// 2. Cache Routes
echo "2️⃣ Cache Routes...\n";
try {
    Illuminate\Support\Facades\Artisan::call('route:cache');
    echo "   ✅ Routes cached!\n\n";
} catch (Exception $e) {
    echo "   ⚠️ " . $e->getMessage() . "\n\n";
}

// 3. Cache Views
echo "3️⃣ Cache Views...\n";
try {
    Illuminate\Support\Facades\Artisan::call('view:cache');
    echo "   ✅ Views cached!\n\n";
} catch (Exception $e) {
    echo "   ⚠️ " . $e->getMessage() . "\n\n";
}

echo "================================\n";
echo "🚀 HOÀN TẤT! Timezone: Asia/Ho_Chi_Minh (GMT+7)\n";
echo "   Hãy reload lại trang chủ để cảm nhận sự khác biệt.\n\n";
echo "⚠️ HÃY XÓA CÁC FILE: setup.php, dbtest.php, optimize.php!\n";
echo '</pre>';
