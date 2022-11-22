<?php
require 'conexao.php';
require 'models/vendas.php';

class daoVendas implements VendaDAO {
    private $conexao;

    public function __construct(PDO $driver) {
        $this->conexao = $driver;
    }

    public function add(Vendas $v){

        $sql = $this->conexao->prepare("INSERT sale VALUES seller = :seller, product = :product, amount = :amount, status = :status, date =:date, total = :total");
        $sql->bindValue(':seller', $v->getVendedor());
        $sql->bindValue(':product', $v->getProduto());
        $sql->bindValue(':amount', $v->getQuantidade());
        $sql->bindValue(':status', $v->getStatus());
        $sql->bindValue(':date', $v->getData());
        $sql->bindValue(':total', $v->getTotal());
        $sql->execute();
        
    }

    public function edit(Vendas $v){
        
        echo 'atualiza o id: '.$v->getId().' com o seller agora sendo '.$v->getVendedor();

        $sql = $this->conexao->prepare("UPDATE sale SET seller = :seller, product = :product, amount = :amount, status = :status, date =:date, total = :total  WHERE id = :id");
        $sql->bindValue(':id', $v->getId());
        $sql->bindValue(':seller', $v->getVendedor());
        $sql->bindValue(':product', $v->getProduto());
        $sql->bindValue(':amount', $v->getQuantidade());
        $sql->bindValue(':status', $v->getStatus());
        $sql->bindValue(':date', $v->getData());
        $sql->bindValue(':total', $v->getTotal());
        $sql->execute();
        
    }

    public function remove($id){
        $sql = $this->conexao->prepare("DELETE FROM sale WHERE id = :id");
        $sql->bindValue(':id',$id);
        $sql->execute();     
    }

    public function get($id){
        $data = [];
        $sql = $this->conexao->query("SELECT * FROM sale WHERE id = $id");
        if($sql->rowCount() > 0){
            $data = $sql->fetch();
        }
        return $data;
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