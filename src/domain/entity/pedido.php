<?php

require_once 'carro.php';

require_once __DIR__.'/../../service/calculadora.php';

class Pedido
{
    private array $carros;
    private float $precoTotal;
    private bool $finalizado = false;
    public function __construct(array $carro)
    {
        if ($this->finalizado == false) {
            try {
                foreach ($carro as $c) {
                    $this->carros[] = $c;
                    echo $c->getModelo() . " foi add " . $c->getPreco() . "\n";
                }
                $calculadora = new Soma();
                echo "Total acumulado: ";
                $this->precoTotal = $calculadora->calculo($this->carros);
                echo "\n";
            } catch (\Throwable $th) {
                echo "erro \n";
            }
        } else {
            throw new DomainException("Error");
        }
    }
    public function finalizar()
    {
        if ($this->finalizado == false) {
            $this->finalizado = true;
            echo "finalizado \n";
        } else {
            throw new DomainException("Error");
        }
    }
}