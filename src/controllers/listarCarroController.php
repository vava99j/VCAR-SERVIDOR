<?php

class listarCarroController{
    public function handle() : void {
        try {
            $pdo = Conexao::conexao();
            $repository = new CarroRepositoryPDO($pdo);
            $carros = $repository->listar();
            echo json_encode($carros);
        } catch (error) {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao listar carros']);
        }
    }
}