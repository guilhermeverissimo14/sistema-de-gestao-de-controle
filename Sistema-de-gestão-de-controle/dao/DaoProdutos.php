<?php

require 'models/produtos.php';

class DaoProdutos implements produtoDAO{
    private $conexao;

    public function __construct(PDO $driver) {
        $this->conexao = $driver;
    }
    public function add(Produtos $p){

    }

    public function edit($id){

    }

    public function remove($id){

    }

    public function get($id){

    }
    public function getAll(){
        $array = [];

        $sql = $this->conexao->query("SELECT * FROM product");
        
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();
            
            foreach($data as $item){
                $u = new Produtos();
                $u->setId($item['id']);
                $u->setNome($item['name']);
                $u->setQuantidade($item['amount']);
                $u->setValor($item['value']);
                $array[] = $u;
            } 
        }
        return $array;
    }
}