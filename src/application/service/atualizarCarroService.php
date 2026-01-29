<?php
require_once __DIR__.'/../../domain/entity/carro.php';
class AtualizarCarroService
{
    private CarroRepository $repository;
    public function __construct(CarroRepository $repository)
    {
        $this->repository = $repository;
    }

    public function executar(atualizarCarroDTO $DTO)
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
            $DTO->ft5,
            $DTO->id
        );
        $this->repository->atualizar($carro);
    }
}