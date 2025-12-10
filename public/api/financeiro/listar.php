<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

header("Content-Type: application/json"); 
require_once "../conexao.php";

try {
    $stmt = $pdo->query("SELECT * FROM financeiro");
    $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($carros);
} catch (PDOException $e) {
    echo json_encode(["erro" => $e->getMessage()]);
}
?>
