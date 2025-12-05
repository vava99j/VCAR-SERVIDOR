<?php
header("Content-Type: application/json"); // define retorno JSON
require_once "conexao.php";

try {
    $stmt = $pdo->query("SELECT * FROM carros");
    $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($carros); // envia array JSON
} catch (PDOException $e) {
    echo json_encode(["erro" => $e->getMessage()]);
}
?>
