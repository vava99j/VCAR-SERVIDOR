<?php
/*
abstract class Product implements Exibivel{
 protected $nome;
 protected $preco;

 public function __construct($nome, $preco){
$this->nome = $nome;
$this->preco = $preco;
 }

 abstract public function info();
}

class tenis extends Product{
    private $marca;
    public function __construct($nome, $preco, $marca){
        parent::__construct($nome, $preco);
        $this->marca = $marca;
    }

public function info(){
    return"Tenis: $this->marca, $this->nome, R$$this->preco \n";
 }
}

class Camisa extends Product{
    private $tamanho;
    public function __construct($nome, $preco, $tamanho){
        parent::__construct($nome, $preco);
        $this->tamanho = $tamanho;
    }

public function info(){
    return"Camisa: $this->tamanho, $this->nome, R$$this->preco \n";
 }
}


//interface
interface Exibivel{
    public function info();
}

$produtos = [
new Camisa("polo lacoste", 700, "M"),
new Tenis("disk", 20000, "puma"),
];
foreach ($produtos as $p) {
    echo $p -> info();
}