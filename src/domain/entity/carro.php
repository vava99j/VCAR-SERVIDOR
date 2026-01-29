<?php
class Carro
{
    protected ?int $id;
    protected string $marca;
    protected string $modelo;
    protected int $ano;
    protected string $descricao;
    protected string $telefone;
    protected float $precoVenda;
    protected float $precoCompra;
    protected string $ft1;
    protected string $ft2;
    protected string $ft3;
    protected string $ft4;
    protected string $ft5;

    public function __construct(
        string $marca,
        string $modelo,
        int $ano,
        string $descricao,
        string $telefone,
        float $precoCompra,
        float $precoVenda,
        string $ft1,
        string $ft2,
        string $ft3,
        string $ft4,
        string $ft5,
        ?int $id = null,
    ) {
        $this->id = $id;
        $this->marca = $marca;
        $this->modelo = $modelo;
        if ($ano < 1980) {
            throw new DomainException("Error");
        } else {
            $this->ano = $ano;
        }
        $this->descricao = $descricao;
        if ($precoCompra > $precoVenda) {
            throw new DomainException("Error");
        } else {

            $this->precoVenda = $precoVenda;
            $this->precoCompra = $precoCompra;
        }
        $this->telefone = $telefone;
        $this->ft1 = $ft1;
        $this->ft2 = $ft2;
        $this->ft3 = $ft3;
        $this->ft4 = $ft4;
        $this->ft5 = $ft5;

    }
    public function getMarca(): string
    {
        return $this->marca;
    }
    public function getModelo(): string
    {
        return $this->modelo;
    }
    public function getAno(): int
    {
        return $this->ano;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function getDescricao(): string
    {
        return $this->descricao;
    }
    public function getPrecoVenda(): float
    {
        return $this->precoVenda;
    }
    public function getPrecoCompra(): float
    {
        return $this->precoCompra;
    }
    public function getft1(): string
    {
        return $this->ft1;
    }
    public function getft2(): string
    {
        return $this->ft2;
    }
    public function getft3(): string
    {
        return $this->ft3;
    }
    public function getft4(): string
    {
        return $this->ft4;
    }
    public function getft5(): string
    {
        return $this->ft5;
    }
    public function getId(): int {
        return $this->id;
    }
}