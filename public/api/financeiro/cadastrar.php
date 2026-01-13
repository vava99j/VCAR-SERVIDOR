<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: POST');

header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

require_once "../conexao.php";

$json_data = file_get_contents('php://input');

$data = json_decode($json_data, true);

if ($data === null) {
    http_response_code(400);
    echo json_encode(["message" => "Erro: Não foi possível decodificar o JSON."]);
    exit;
}

$marca = $data["marca"] ?? '';
$modelo = $data["modelo"] ?? '';
$vendeu = $data["vendeu"] ?? '';
$comprou = $data["comprou"] ?? '';


try {
    $stmt = $pdo->prepare("
      INSERT INTO financeiro (
    data_time,
    marca,
    modelo,
    vendeu,
    comprou
)
VALUES (
    NOW(),                
    :marca,
    :modelo,
    :vendeu,
    :comprou                 
);
    ");

    $stmt->execute([
        ":marca"     => $marca,
        ":modelo"    => $modelo,
        ":vendeu" => $vendeu,
        ":comprou" => $comprou
    ]);


    http_response_code(201);
    echo json_encode(["message" => "Carro cadastrado com sucesso!", "id" => $pdo->lastInsertId()]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["message" => "Erro ao inserir dados no banco de dados.", "error" => $e->getMessage()]);
}
