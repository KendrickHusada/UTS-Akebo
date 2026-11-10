<?php
header('Content-Type: application/json');

$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$db   = getenv('DB_NAME') ?: 'giftpixie_portfolio';

mysqli_report(MYSQLI_REPORT_OFF);
$conn = @mysqli_connect($host, $user, $pass, $db);

$status = [
    'app'       => 'GiftPixie',
    'status'    => $conn ? 'ok' : 'error',
    'database'  => $conn ? 'connected' : 'disconnected',
    'php'       => PHP_VERSION,
    'timestamp' => date('c'),
];

if ($conn) {
    $res = mysqli_query($conn, 'SELECT COUNT(*) AS total FROM information_schema.tables WHERE table_schema = DATABASE()');
    $status['tables'] = (int) mysqli_fetch_assoc($res)['total'];
    mysqli_close($conn);
} else {
    http_response_code(500);
}

echo json_encode($status, JSON_PRETTY_PRINT);
