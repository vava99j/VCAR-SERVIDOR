<?php
interface MetodoPagamento
{
  public function calcularValorFinal(float $valor): float;
  public function pagar(float $valor): void;
}
interface ItemPedido
{
  public function getPreco(): float;

  public function processar(): void;
}
interface Desconto
{
  public function descontoAplicado(float $valor): float;
}


abstract class Produto implements ItemPedido
{
  protected $nome;
  protected $preco;

  public function __construct($nome, $preco)
  {
    $this->nome = $nome;
    $this->preco = max(0, $preco);
  }

  public function getPreco(): float
  {
    return $this->preco;
  }



  public function info()
  {
    echo "Produto: " . $this->nome . "  Preço:R$" . $this->preco . "\n";
  }

}


class ProdutoDigital extends Produto
{
  public function __construct($nome, $preco)
  {
    parent::__construct($nome, $preco);
  }
  public function getPreco(): float
  {
    return parent::getPreco();
  }


  public function info()
  {
    parent::info();
  }
  public function processar(): void
  {
    echo "   download pronto \n";
  }
}


class ProdutoFisico extends Produto
{
  public function __construct($nome, $preco)
  {
    parent::__construct($nome, $preco);
  }
  public function getPreco(): float
  {

    return $this->preco + 20;
  }

  public function info()
  {
    parent::info();
  }
  public function processar(): void
  {
    $this->info();
    echo "   produto enviado \n";
  }
}

class PagamentoPix implements MetodoPagamento
{
  public function calcularValorFinal(float $valor): float
  {
    return $valor;
  }
  public function pagar(float $valor): void
  {
    echo "Pix: R$ $valor\n";
  }
}


class PagamentoCartao implements MetodoPagamento
{
  public function calcularValorFinal(float $valor): float
  {
    return $valor * 1.10;
  }

  public function pagar(float $valor): void
  {
    echo "Cartão: R$ $valor\n";
  }
}

class Desconto20 implements Desconto
{
  function descontoAplicado(float $valor): float
  {
    $desc = 0;
    $desc += $valor * 0.80;
    echo "-20%: " . $valor . " para " . $desc . "\n";
    return $desc;
  }
}

class Desconto15 implements Desconto
{
  function descontoAplicado(float $valor): float
  {
    $desc = 0;
    $desc += $valor * 0.85;
    echo "-15%: " . $valor . " para " . $desc . "\n";
    return $desc;
  }
}


class Pedido
{
  private array $produto;
  private MetodoPagamento $pagamento;
  private Desconto $desconto;
  public function __construct(array $produto, MetodoPagamento $pagamento, Desconto $desconto)
  {
    $this->produto = $produto;
    $this->pagamento = $pagamento;
    $this->desconto = $desconto;
  }
  private function calcularTotal(): float
  {
    $total = 0;
    foreach ($this->produto as $produto) {
      $total += $produto->getPreco();

    }
    return $total;
  }

  public function finalizar(): void
  {
    foreach ($this->produto as $produto) {
      $produto->info();
    }

    $precoI = $this->calcularTotal();
    $total = $this->desconto->descontoAplicado($precoI);
    $totalt = $this->pagamento->calcularValorFinal($total);
    $this->pagamento->pagar($totalt);
  }
}


$produto1 = [
  new ProdutoFisico("spiner", 50),
  new ProdutoDigital("minecraft", 24)
];
$pagamento1 = new PagamentoPix();
$desconto1 = new Desconto20();
$pedido1 = new Pedido($produto1, $pagamento1, $desconto1);
$pedido1->finalizar();


$produto2 = [
  new ProdutoFisico("spiner", 50),
  new ProdutoDigital("minecraft", 24)
];
$pagamento2 = new PagamentoPix();
$desconto2 = new Desconto15();
$pedido2 = new Pedido($produto2, $pagamento2, $desconto2);
$pedido2->finalizar();