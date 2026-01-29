<?php

interface CarroRepository{
    public function salvar(Carro $carro);
    public function listar(): array;
    public function atualizar(Carro $carro); 
    public function deletePorId(int $id);
}

