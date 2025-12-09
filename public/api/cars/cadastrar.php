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

$marca     = $data["marca"] ?? '';
$modelo    = $data["modelo"] ?? '';
$descricao = $data["descricao"] ?? null; 
$preco     = $data["preco"] ?? '';
$contato   = $data["contato"] ?? '';

$ft1 = $data["ft1"] ?? null;
$ft2 = $data["ft2"] ?? null;
$ft3 = $data["ft3"] ?? null;
$ft4 = $data["ft4"] ?? null;
$ft5 = $data["ft5"] ?? null; 

try {
    $stmt = $pdo->prepare("
        INSERT INTO carros 
        (marca, modelo, descricao, preco, contato, ft1, ft2, ft3, ft4, ft5)
        VALUES
        (:marca, :modelo, :descricao, :preco, :contato, :ft1, :ft2, :ft3, :ft4, :ft5)
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
        ":ft5"        => $ft5
    ]);

    //
    http_response_code(201); 
    echo json_encode(["message" => "Carro cadastrado com sucesso!", "id" => $pdo->lastInsertId()]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["message" => "Erro ao inserir dados no banco de dados.", "error" => $e->getMessage()]);
}
?>