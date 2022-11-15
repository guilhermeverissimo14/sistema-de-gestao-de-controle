<?php

require './models/produtos.php';

class DaoProdutos implements produtoDao{
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

        $sql = $this->conexao->query("SELECT * FROM product ");
        
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();
            
            foreach($data as $item){
                $p = new Produtos();
                $p->setId($item['id']);
                $p->setQuantidade($item['amount']);
                $p->setNome($item['name']);
                $p->setValor($item['price']);
                $array[] = $p;
            } 
        }

        return $array;
    }
}
