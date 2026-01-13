<?php
$databaseUrl = "mysql://root:HuYrmTlUADuNstcUIJCJHPxtKDBnFvPm@yamabiko.proxy.rlwy.net:40199/railway";

$components = parse_url($databaseUrl);

$host   = $components['host'];
$port   = $components['port'] ?? 3306;
$user   = $components['user'];
$pass   = $components['pass'];
$dbname = ltrim($components['path'], '/');

$dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Erro ao conectar com o banco de dados MySQL.");
}
