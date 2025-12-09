<?php
header('Access-Control-Allow-Origin: *');

// Permite os métodos que você usará (GET, POST, etc.)
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

// Permite os cabeçalhos que serão enviados na requisição
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

// Se for um método OPTIONS (pré-voo CORS), encerra a execução
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

header("Content-Type: application/json"); // define retorno JSON
require_once "../conexao.php";

try {
    $stmt = $pdo->query("SELECT
    SUM(vendeu) AS Total_Vendas,
    SUM(comprou) AS Total_Compras,
    SUM(vendeu) - SUM(comprou) AS Lucro_Liquido -- Opcional, para calcular a diferença
FROM
    financeiro;");
    $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($carros); // envia array JSON
} catch (PDOException $e) {
    echo json_encode(["erro" => $e->getMessage()]);
}
?>
