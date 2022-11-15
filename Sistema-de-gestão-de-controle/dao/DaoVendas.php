<?php

require 'models/vendas.php';

class daoVendas implements VendaDAO {
    private $conexao;

    public function __construct(PDO $driver) {
        $this->conexao = $driver;
    }

    public function add(Vendas $v){

    }

    public function edit($id){

    }

    public function remove($id){

    }

    public function get($id){

    }

    public function getAll(){
        $array = [];

        $sql = $this->conexao->query("SELECT * FROM sale");
        
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();
            
            foreach($data as $item){
                $u = new Vendas();
                $u->setId($item['id']);
                $u->setData($item['date']);
                $u->setQuantidade($item['amount']);
                $u->setProduto($item['product']);
                $u->setVendedor($item['seller']);
                $u->setTotal($item['total']);
                $u->setStatus($item['status']);
                $array[] = $u;
            } 
        }

        return $array;
    }
}