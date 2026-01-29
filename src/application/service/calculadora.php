<?php

interface Calculo
{
    public function calculo(array $carros): float;
}

abstract class Calculadora implements Calculo
{
    abstract function calculo(array $carros): float;
}

class Soma extends Calculadora implements Calculo
{
    public function calculo(array $carros):float
    {
        foreach ($carros as $c) {
            $total += $c->getPreco();
        }
        return $total;
    }
}
