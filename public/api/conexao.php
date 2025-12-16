<?php
$databaseUrl = "postgresql://vava99j:rhGT254Rw1rpgN1hwji4tYO0SBBwLQ5V@dpg-d4r3vlnpm1nc73bgs5b0-a.oregon-postgres.render.com/vbd";

$components = parse_url($databaseUrl);

$host   = $components['host'];
$port   = $components['port'] ?? 5432;
$user   = $components['user'];
$pass   = $components['pass'];
$dbname = ltrim($components['path'], '/');

$dsn = "pgsql:host={$host};port={$port};dbname={$dbname}";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Erro ao conectar com o banco de dados PostgreSQL.");
}
