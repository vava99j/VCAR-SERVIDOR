<?php
require_once 'infrastructure/persistence/conexao.php';



ini_set('display_errors', 1);
ini_set('display_startup_errors', value: 1);
error_reporting(E_ALL);


$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

//POST
require_once 'controllers/criarCarroController.php';
require_once 'controllers/criarPedidoController.php';
if ($uri === '/carros' && $method === 'POST') {
    (new CriarCarroController())->handle();
}

if ($uri === '/pedido' && $method === 'POST') {
    (new CriarPedidoController())->handle();
}


//PATCH

require_once 'controllers/atualizarCarroController.php';
if ($uri === '/carros' && $method === 'PATCH') {
    (new AtualizarCarroController())->handle();
}


//GET

require_once 'infrastructure/repository/carroRepositoryPDO.php';
require_once 'infrastructure/repository/pedidoRepositoryPDO.php';

if ($uri === '/carros' && $method === 'GET') {
    $pdo = Conexao::conexao();
    $repository = new CarroRepositoryPDO($pdo);

    echo json_encode($repository->listar());
}

if ($uri === '/financeiro' && $method === 'GET') {
    $pdo = Conexao::conexao();
    $repository = new PedidoRepositoryPDO($pdo);

    echo json_encode($repository->listar());
}


//DELETE
require_once 'controllers/deleteCarrroController.php';
if ($uri === '/carros' && $method === 'DELETE') {
    (new deleteCarroController())->handle();
}
