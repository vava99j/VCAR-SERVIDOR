<?php
require_once __DIR__.'/../application/DTO/criarPedidoDTO.php';
require_once __DIR__.'/../infrastructure/repository/pedidoRepositoryPDO.php';
require_once __DIR__.'/../infrastructure/persistence/conexao.php';
require_once __DIR__.'/../application/service/criarPedidoService.php';
class CriarPedidoController
{
    public function handle(): void
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $DTO = new CriarPedidoDTO($data);
            $pdo = Conexao::conexao();
            $repository = new PedidoRepositoryPDO($pdo);
            $service = new CriarPedidoService($repository);
            $service->executar($DTO);

            http_response_code(201);
            echo json_encode(['mensagem' => 'Pedido criado com sucesso']);
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

