<?php
require_once __DIR__.'/../../domain/entity/carro.php';
class CriarCarroService
{
    private CarroRepository $repository;
    public function __construct(CarroRepository $repository)
    {
        $this->repository = $repository;
    }

    public function executar(CriarCarroDTO $DTO)
    {
        $carro = new Carro(
            $DTO->marca,
            $DTO->modelo,
            $DTO->ano,
            $DTO->descricao,
            $DTO->telefone,
            $DTO->precoCompra,
            $DTO->precoVenda,
            $DTO->ft1,
            $DTO->ft2,
            $DTO->ft3,
            $DTO->ft4,
            $DTO->ft5
        );
        $this->repository->salvar($carro);
    }
}