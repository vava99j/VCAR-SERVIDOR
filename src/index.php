<?php
require_once 'infrastructure/persistence/conexao.php';
require_once 'controllers/criarCarroController.php';
require_once 'controllers/atualizarCarroController.php';
require_once 'infrastructure/repository/carroRepositoryPDO.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', value: 1);
error_reporting(E_ALL);


$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if ($uri === '/carros' && $method === 'POST') {
    (new CriarCarroController())->handle();
}
if ($uri === '/carros' && $method === 'PATCH') {
    (new AtualizarCarroController())->handle();
}

if ($uri === '/carros' && $method === 'GET') {
    $pdo = Conexao::conexao();
    $repository = new CarroRepositoryPDO($pdo);

    echo json_encode($repository->listar());
}
