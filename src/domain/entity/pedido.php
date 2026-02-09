<?php

class Pedido{
    private string $marca ;
    private string $modelo ;
    private float $precoCompra;
    private float $precoVenda;

    public function __construct(
        string $marca,
        string $modelo,
        float $precoCompra,
        float $precoVenda
    )
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->precoCompra = $precoCompra;
        $this->precoVenda = $precoVenda;
    }
    public function getMarca(): string{
        return $this->marca;
    }

    public function getModelo(): string{
        return $this->modelo;
    }

    public function getPrecoCompra(): float{
        return $this->precoCompra;        
    }
    public function getPrecoVenda(): float{
        return $this->precoVenda;        
    }
}
