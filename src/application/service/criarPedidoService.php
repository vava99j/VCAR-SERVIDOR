<?php
require_once __DIR__.'/../../domain/entity/pedido.php';

class CriarPedidoService
{
    private PedidoRepository $repository;
    public function __construct(PedidoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function executar(CriarPedidoDTO $DTO)
    {
        $pedido = new Pedido(
            $DTO->marca,
            $DTO->modelo,
            $DTO->precoCompra,
            $DTO->precoVenda,
        );
        $this->repository->salvar($pedido);
    }
}