<?php
/**
 * XÓA TOÀN BỘ CACHE - Chạy khi bị lỗi sau deploy
 * XÓA FILE NÀY SAU KHI DÙNG!
 */
echo '<pre style="font-family:monospace;background:#1e293b;color:#e2e8f0;padding:20px;border-radius:12px;font-size:14px;">';
echo "🧹 XÓA TOÀN BỘ CACHE\n";
echo "=====================\n\n";

// 1. Xóa compiled views
$viewsDir = __DIR__ . '/../storage/framework/views/';
$count = 0;
if (is_dir($viewsDir)) {
    foreach (glob($viewsDir . '*.php') as $file) {
        @unlink($file);
        $count++;
    }
}
echo "✅ Đã xóa $count compiled views\n";

// 2. Xóa file cache
$cacheDir = __DIR__ . '/../storage/framework/cache/data/';
if (is_dir($cacheDir)) {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($cacheDir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    $cCount = 0;
    foreach ($iterator as $file) {
        if ($file->isFile()) { @unlink($file->getRealPath()); $cCount++; }
    }
    echo "✅ Đã xóa $cCount cache files\n";
}

// 3. Xóa config cache
$configCache = __DIR__ . '/../bootstrap/cache/config.php';
if (file_exists($configCache)) { @unlink($configCache); echo "✅ Đã xóa config cache\n"; }

// 4. Xóa route cache
$routeCache = __DIR__ . '/../bootstrap/cache/routes-v7.php';
if (file_exists($routeCache)) { @unlink($routeCache); echo "✅ Đã xóa route cache\n"; }

// 5. Xóa services + packages cache  
foreach (glob(__DIR__ . '/../bootstrap/cache/*.php') as $f) {
    @unlink($f);
}
echo "✅ Đã xóa bootstrap cache\n";

// 6. Xóa setup lock
$lock = __DIR__ . '/../storage/setup.lock';
if (file_exists($lock)) { @unlink($lock); echo "✅ Đã xóa setup.lock\n"; }

echo "\n🎉 XONG! Tất cả cache đã bị xóa sạch.\n";
echo "   Hãy reload lại dienthoailaptop.vn để kiểm tra.\n";
echo "   ⚠️ XÓA FILE clear-cache.php NGAY!\n";
echo '</pre>';
