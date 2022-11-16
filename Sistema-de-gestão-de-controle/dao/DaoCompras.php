<?php

require 'models/compras.php';

class DaoCompras implements CompraDAO{
    private $conexao;

    public function __construct(PDO $driver) {
        $this->conexao = $driver;
    }
    public function add(Compras $c){

    }

    public function edit($id){

    }

    public function remove($id){

    }

    public function get($id){

    }
    public function getAll(){
        $array = [];

        $sql = $this->conexao->query("SELECT * FROM purchase");
        
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();
            
            foreach($data as $item){
                $c = new Compras();
                $c->setId($item['id']);
                $c->setNome($item['name_product']);
                $c->setQuantidade($item['amount']);
                $c->setValor($item['value']);
                $array [] = $c;
            } 
        }
        return $array;
    }
}