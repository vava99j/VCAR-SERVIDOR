<?php
header('Access-Control-Allow-Origin: *');

// Permite os métodos que você usará (GET, POST, etc.)
header('Access-Control-Allow-Methods: PATCH');

// Permite os cabeçalhos que serão enviados na requisição
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

// Se for um método OPTIONS (pré-voo CORS), encerra a execução
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

require_once "conexao.php";

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

// 3. ATRIBUIÇÃO DE VARIÁVEIS A PARTIR DO JSON
// Usamos a chave 'descricao' (ASCII) para corresponder ao Dart.
$marca     = $data["marca"] ?? '';
$modelo    = $data["modelo"] ?? '';
$descricao = $data["descrição"] ?? '';
$preco     = $data["preco"] ?? '';
$contato   = $data["contato"] ?? '';
$ft1 = $data["ft1"] ?? null;
$ft2 = $data["ft2"] ?? null;
$ft3 = $data["ft3"] ?? null;
$ft4 = $data["ft4"] ?? null;
$ft5 = $data["ft5"] ?? null;
$id        = $data["id"] ?? 0;


// 4. PREPARAR E EXECUTAR O INSERT
try {
$stmt = $pdo->prepare("
    UPDATE carros SET 
        marca = :marca,
        modelo = :modelo,
        descricao = :descricao,
        preco = :preco,
        contato = :contato,
        ft1 = :ft1,
        ft2 = :ft2,
        ft3 = :ft3,
        ft4 = :ft4,
        ft5 = :ft5
    WHERE id = :id
");



$stmt->execute([
    ":marca"     => $marca,
    ":modelo"    => $modelo,
    ":descricao" => $descricao,
    ":preco"     => $preco,
    ":contato"   => $contato,
    ":ft1"       => $ft1,
    ":ft2"       => $ft2,
    ":ft3"       => $ft3,
    ":ft4"       => $ft4,
    ":ft5"       => $ft5,
    ":id"        => $id
]);


    // Sucesso
    http_response_code(201); // Created
    echo json_encode(["message" => "Carro cadastrado com sucesso!", "id" => $pdo->lastInsertId()]);
} catch (PDOException $e) {
    // Erro no banco de dados
    http_response_code(500); // Internal Server Error
    // Retornamos a mensagem de erro detalhada para ajudar no debugging do Dart
    echo json_encode(["message" => "Erro ao inserir dados no banco de dados.", "error" => $e->getMessage()]);
}
