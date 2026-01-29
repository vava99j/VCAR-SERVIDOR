<?php
require_once __DIR__.'/../application/DTO/criarCarroDTO.php';
require_once __DIR__.'/../infrastructure/repository/carroRepositoryPDO.php';
require_once __DIR__.'/../infrastructure/persistence/conexao.php';
require_once __DIR__.'/../application/service/criarCarroService.php';
class CriarCarroController
{
    public function handle(): void
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $DTO = new CriarCarroDTO($data);
            $pdo = Conexao::conexao();
            $repository = new CarroRepositoryPDO($pdo);
            $service = new CriarCarroService($repository);
            $service->executar($DTO);

            http_response_code(201);
            echo json_encode(['mensagem' => 'Carro criado com sucesso']);
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

