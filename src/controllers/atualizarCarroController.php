<?php
require_once __DIR__.'/../application/DTO/atualizarCarroDTO.php';
require_once __DIR__.'/../infrastructure/repository/carroRepositoryPDO.php';
require_once __DIR__.'/../infrastructure/persistence/conexao.php';
require_once __DIR__.'/../application/service/atualizarCarroService.php';
class atualizarCarroController
{
    public function handle(): void
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $DTO = new atualizarCarroDTO($data);
            $pdo = Conexao::conexao();
            $repository = new CarroRepositoryPDO($pdo);
            $service = new AtualizarCarroService($repository);
            $service->executar($DTO);

            http_response_code(200);
            echo json_encode(['mensagem' => 'Carro atualizado com sucesso']);
       } catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'erro' => $e->getMessage(),
        'arquivo' => $e->getFile(),
        'linha' => $e->getLine(),
        'trace' => $e->getTraceAsString()
    ]);
}
        }
    }

