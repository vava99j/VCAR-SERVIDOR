<?php

class listarPedidosController{
    public function handle() : void {
        try {
            $pdo = Conexao::conexao();
            $repository = new pedidoRepositoryPDO($pdo);
            $pedidos = $repository->listar();
            echo json_encode($pedidos);
        } catch (error) {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao listar carros']);
        }
    }
}