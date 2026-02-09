<?php

interface PedidoRepository{
    public function salvar(Pedido $pedido);
    public function listar(): array;
    public function deletePorId(int $id);
}

