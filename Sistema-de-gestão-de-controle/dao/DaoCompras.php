<?php

require 'models/compras.php';
require 'conexao.php';

class DaoCompras implements CompraDAO{
    private $conexao;

    public function __construct(PDO $driver) {
        $this->conexao = $driver;
    }
    public function add(Compras $c){
        $sql = $this->conexao->prepare("INSERT purchase (amount, value, name_product) VALUES (:amount, :value, :name_product)");
        $sql->bindValue(':amount', $c->getQuantidade());
        $sql->bindValue(':name_product', $c->getNome());
        $sql->bindValue(':value', $c->getValor());
        $sql->execute();
    }

    public function edit(Compras $c){
        echo 'atualiza o id: '.$c->getId().' com o valor agora sendo '.$c->getValor();

        $sql = $this->conexao->prepare("UPDATE purchase SET amount = :amount, value = :value, name_product = :name_product  WHERE id = :id");
        $sql->bindValue(':id', $c->getId());
        $sql->bindValue(':amount', $c->getQuantidade());
        $sql->bindValue(':name_product', $c->getNome());
        $sql->bindValue(':value', $c->getValor());
        $sql->execute();
    }

    public function remove($id){
        $sql = $this->conexao->prepare("DELETE FROM purchase WHERE id = :id");
        $sql->bindValue(':id',$id);
        $sql->execute();
    }

    public function get($id){
        $data = [];
        $sql = $this->conexao->query("SELECT * FROM purchase WHERE id = $id");
        if($sql->rowCount() > 0){
            $data = $sql->fetch();
        }
        return $data;
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