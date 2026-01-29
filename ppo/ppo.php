<?php 
/*
//public
class user{ //casse
    public $nome;
    public $tenis;

    public function exibir(){
        echo "Nome: $this->nome , Tenis: $this->tenis \n"; 
    }
}

$user1 = new user; //objeto
$user1->nome = "jorge"; //atributo
$user1->tenis = "slipstream";
$user1->exibir();


//private
class Produto {
    private $nome;
    private $preco;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setPreco($preco) {
        if ($preco > 0) {
            $this->preco = $preco;
        }
    }

    public function exibir() {
        echo "Produto: $this->nome - Preço: R$ $this->preco \n";
    }
}


$pro1 = new produto;
$pro1->setNome("Mouse");
$pro1->setPreco(120);
$pro1->exibir();

//protected
class item {
    protected $nome;
    protected $preco;

    public function __construct($nome, $preco) {
        $this->nome = $nome;
        $this->preco = $preco;
    }   

    public function info() {
        return"Produto: $this->nome - Preço: R$ $this->preco";
    }
}
class tenis extends item{
    private $marca;

    public function __construct($nome, $preco, $marca) {
        parent::__construct($nome, $preco);  //recicla codigo
        $this->marca = $marca; //complementa oq ja tinha
    }

    public function info(){
        return parent::info() . " - Marca: $this->marca \n";
    }
}
$tenis = new Tenis("Slipstream", 399, "Puma");
echo $tenis->info();


//poliformismo
class coisa{
    public function info(){
        return"algo \n";
    }
}
class salto extends coisa{
    public function info(){
        return"salto \n";
    }
}
class blusa extends coisa{
    public function info(){
        return"camisa \n";
    }
}
$coisa = [
    new salto(),
    new blusa(),
];

foreach ($coisa as $p) { //sincroniza o array acima
    echo $p->info();  // procura metodo info
}
