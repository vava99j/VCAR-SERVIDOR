<?php

require_once __DIR__.'/../../domain/repository/pedidoRepository.php';
class pedidoRepositoryPDO implements PedidoRepository{
    private PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function salvar(Pedido $pedido)
    {
        $sql = "
            INSERT INTO financeiro 
            (marca, modelo, valor_compra, valor_venda)
            VALUES 
            (:marca, :modelo, :preco_compra, :preco_venda)
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':marca' => $pedido->getMarca(),
            ':modelo' => $pedido->getModelo(),
            ':preco_compra' => $pedido->getPrecoCompra(),
            ':preco_venda' => $pedido->getPrecoVenda()
        ]);
    }

    public function listar(): array
    {
       $sql = "SELECT * FROM financeiro";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletePorId(int $id)
    {
              $sql = "DELETE FROM financeiro WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
