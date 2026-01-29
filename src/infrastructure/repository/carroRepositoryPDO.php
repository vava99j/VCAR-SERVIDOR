<?php
require_once __DIR__.'/../../domain/repository/carroRepository.php';
class CarroRepositoryPDO implements CarroRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function salvar(Carro $carro): void
    {
        $sql = "
            INSERT INTO carros 
            (marca, modelo, ano, telefone, descricao, preco_compra, preco_venda, ft1, ft2, ft3, ft4, ft5)
            VALUES 
            (:marca, :modelo, :ano, :telefone, :descricao, :preco_compra, :preco_venda, :ft1, :ft2, :ft3, :ft4, :ft5)
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':marca' => $carro->getMarca(),
            ':modelo' => $carro->getModelo(),
            ':ano' => $carro->getAno(),
            ':descricao' => $carro->getDescricao(),
            ':telefone' => $carro->getTelefone(),
            ':preco_compra' => $carro->getPrecoCompra(),
            ':preco_venda' => $carro->getPrecoVenda(),
            ':ft1' => $carro->getft1(),
            ':ft2' => $carro->getft2(),
            ':ft3' => $carro->getft3(),
            ':ft4' => $carro->getft4(),
            ':ft5' => $carro->getft5(),
        ]);
    }

    public function listar(): array
    {
        $sql = "SELECT * FROM carros";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizar(Carro $carro)
    {
        $sql = "
             UPDATE carros SET 
    marca = :marca,
    modelo = :modelo,
    descricao = :descricao,
    ano = :ano,
    telefone = :telefone,
    preco_venda = :preco_venda,
    preco_compra = :preco_compra,
    ft1 = :ft1,
    ft2 = :ft2,
    ft3 = :ft3,
    ft4 = :ft4,
    ft5 = :ft5
    WHERE id = :id   
    ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':marca' => $carro->getMarca(),
            ':modelo' => $carro->getModelo(),
            ':ano' => $carro->getAno(),
            ':descricao' => $carro->getDescricao(),
            ':telefone' => $carro->getTelefone(), 
            ':preco_compra' => $carro->getPrecoCompra(),
            ':preco_venda' => $carro->getPrecoVenda(),
            ':ft1' => $carro->getft1(),
            ':ft2' => $carro->getft2(),
            ':ft3' => $carro->getft3(),
            ':ft4' => $carro->getft4(),
            ':ft5' => $carro->getft5(),
            ':id' => $carro->getId()
        ]);
    }
    public function deletePorId(int $Id): void
    {
        $sql = "DELETE FROM carros WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $Id]);
    }
}
