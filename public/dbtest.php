<?php
/**
 * File test kết nối MySQL trực tiếp - XÓA SAU KHI DÙNG!
 */
echo '<pre style="font-family:monospace;background:#1e293b;color:#e2e8f0;padding:20px;border-radius:12px;">';
echo "🔍 TEST KẾT NỐI DATABASE\n";
echo "========================\n\n";

// Đọc .env trực tiếp
$envFile = __DIR__ . '/../.env';
if (!file_exists($envFile)) {
    die("❌ Không tìm thấy file .env!\n");
}

$env = [];
foreach (file($envFile) as $line) {
    $line = trim($line);
    if (empty($line) || $line[0] === '#') continue;
    if (strpos($line, '=') !== false) {
        [$key, $value] = explode('=', $line, 2);
        $env[trim($key)] = trim($value, '"\'');
    }
}

$host = $env['DB_HOST'] ?? 'localhost';
$port = $env['DB_PORT'] ?? '3306';
$db   = $env['DB_DATABASE'] ?? '???';
$user = $env['DB_USERNAME'] ?? '???';
$pass = $env['DB_PASSWORD'] ?? '???';

echo "Host: $host\n";
echo "Port: $port\n";
echo "Database: $db\n";
echo "Username: $user\n";
echo "Password: " . str_repeat('*', strlen($pass) - 2) . substr($pass, -2) . " (dài " . strlen($pass) . " ký tự)\n\n";

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ KẾT NỐI THÀNH CÔNG!\n";
    echo "MySQL version: " . $pdo->query('SELECT VERSION()')->fetchColumn() . "\n";
} catch (PDOException $e) {
    echo "❌ THẤT BẠI: " . $e->getMessage() . "\n\n";
    echo "💡 Kiểm tra lại:\n";
    echo "   1. Mật khẩu DB trên Hostinger có đúng không?\n";
    echo "   2. Tên database có đúng không?\n";
    echo "   3. Username có đúng không?\n";
}

echo '</pre>';
