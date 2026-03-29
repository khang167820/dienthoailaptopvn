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

// 1. Cache Config (không cần đọc .env mỗi request)
echo "1️⃣ Cache Config...\n";
try {
    Illuminate\Support\Facades\Artisan::call('config:cache');
    echo "   ✅ Config cached!\n\n";
} catch (Exception $e) {
    echo "   ⚠️ " . $e->getMessage() . "\n\n";
}

// 2. Cache Routes (không cần quét routes mỗi request)
echo "2️⃣ Cache Routes...\n";
try {
    Illuminate\Support\Facades\Artisan::call('route:cache');
    echo "   ✅ Routes cached!\n\n";
} catch (Exception $e) {
    echo "   ⚠️ " . $e->getMessage() . "\n\n";
}

// 3. Cache Views (pre-compile blade templates)
echo "3️⃣ Cache Views...\n";
try {
    Illuminate\Support\Facades\Artisan::call('view:cache');
    echo "   ✅ Views cached!\n\n";
} catch (Exception $e) {
    echo "   ⚠️ " . $e->getMessage() . "\n\n";
}

// 4. Optimize autoload
echo "4️⃣ Optimize...\n";
try {
    Illuminate\Support\Facades\Artisan::call('optimize');
    echo "   ✅ Optimized!\n\n";
} catch (Exception $e) {
    echo "   ⚠️ " . $e->getMessage() . "\n\n";
}

echo "================================\n";
echo "🚀 HOÀN TẤT! Website đã được tối ưu tốc độ!\n";
echo "   Hãy thử reload lại trang chủ để cảm nhận sự khác biệt.\n\n";
echo "⚠️ HÃY XÓA FILE optimize.php NGAY!\n";
echo '</pre>';
