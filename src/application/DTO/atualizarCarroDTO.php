<?php

class atualizarCarroDTO
{
    public string $marca;
    public string $modelo;
    public int $ano;
    public string $descricao;
    public string $telefone;
    public float $precoCompra;
    public float $precoVenda;
    public string $ft1;
    public string $ft2;
    public string $ft3;
    public string $ft4;
    public string $ft5;
    public string $id;

    public function __construct(array $data)
    {
        if (
            empty($data['marca']) ||
            empty($data['modelo']) ||
            empty($data['ano']) ||
            empty($data['telefone']) ||
            empty($data['precoCompra']) ||
            empty($data['precoVenda']) ||
            empty($data['ft1']) ||
            empty($data['id'])
        ) {
            throw new InvalidArgumentException("Dados ausentes. Recebi apenas: " . implode(', ', array_keys($data)));
        } else {
        }
        $this->id = $data['id'];
        $this->marca = $data['marca'];
        $this->modelo = $data['modelo'];
        $this->ano = $data['ano'];
        $this->telefone = $data['telefone'];
        $this->descricao = $data['descricao'] ?? '';
        $this->precoCompra = $data['precoCompra'];
        $this->precoVenda = $data['precoVenda'];
        $this->ft1 = $data['ft1'];
        $this->ft2 = $data['ft2'] ?? '';
        $this->ft3 = $data['ft3'] ?? '';
        $this->ft4 = $data['ft4'] ?? '';
        $this->ft5 = $data['ft5'] ?? '';
    }
}