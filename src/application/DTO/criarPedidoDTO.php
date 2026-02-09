<?php

final class criarPedidoDTO
{
    public string $marca;
    public string $modelo;
    public float $precoCompra;
    public float $precoVenda;

    public function __construct(array $data)
    {
        if (
            empty($data['marca']) ||
            empty($data['modelo']) ||
            empty($data['preco_compra']) ||
            empty($data['preco_venda'])           
            ) {
            throw new InvalidArgumentException("Dados ausentes. Recebi apenas: " . implode(', ', array_keys($data)));
        }

        $this->marca = $data['marca'];
        $this->modelo = $data['modelo'];
        $this->precoCompra = $data['preco_compra'];
        $this->precoVenda = $data['preco_venda'];
    }
}
