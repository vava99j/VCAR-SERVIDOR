<?php

class deletarCarroService{
    private CarroRepository $id;

    public function __construct(CarroRepository $id){
        $this->id = $id;
    }
    function executar(deletarCarroDTO $DTO){
    $id = $DTO->id;
    $this->id->deletePorId($id);
    }

    }
