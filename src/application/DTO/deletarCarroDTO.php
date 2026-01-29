<?php

class deletarCarroDTO{
    public int $id;

    public function __construct(array $data){

if (empty($data['id'])) {
  throw new \Exception('Not implemented');
}else{
    $this->id = $data['id'];
}    
    }
}

