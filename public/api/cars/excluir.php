<?php
header('Access-Control-Allow-Origin: *');

// Permite os métodos que você usará (GET, POST, etc.)
header('Access-Control-Allow-Methods: DELETE');

// Permite os cabeçalhos que serão enviados na requisição
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

// Se for um método OPTIONS (pré-voo CORS), encerra a execução
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

require_once "../conexao.php";

// 1. LER O CORPO DA REQUISIÇÃO RAW (JSON)
$json_data = file_get_contents('php://input');

// 2. DECODIFICAR O JSON PARA UM ARRAY PHP
$data = json_decode($json_data, true);

// Verifica se os dados JSON foram decodificados corretamente
if ($data === null) {
    http_response_code(400); // Bad Request
    // Responde com JSON, pois o Dart espera isso
    echo json_encode(["message" => "Erro: Não foi possível decodificar o JSON."]);
    exit;
}

$id = $data["id"];


// 4. PREPARAR E EXECUTAR O INSERT
try {
$stmt = $pdo->prepare("
    DELETE FROM carros
    WHERE id = :id
");



$stmt->execute([
    ":id"        => $id
]);


    // Sucesso
    http_response_code(200); // Created
  echo json_encode([
        "message" => "Carro apagado com sucesso!",
        "id" => $id
    ]);
} catch (PDOException $e) {
    // Erro no banco de dados
    http_response_code(500); // Internal Server Error
    // Retornamos a mensagem de erro detalhada para ajudar no debugging do Dart
    echo json_encode(["message" => "Erro ao inserir dados no banco de dados.", "error" => $e->getMessage()]);
}
