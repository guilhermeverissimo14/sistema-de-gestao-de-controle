<?php
require 'conexao.php';
require 'models/vendas.php';

class daoVendas implements VendaDAO {
    private $conexao;

    public function __construct(PDO $driver) {
        $this->conexao = $driver;
    }

    public function add(Vendas $v){
        $sql = $this->conexao->prepare("INSERT sale (seller, product, amount, status, date, total, id_produto) VALUES (:seller, :product, :amount, :status, :date, :total, :id_produto)");
        $sql->bindValue(':seller', $v->getVendedor());
        $sql->bindValue(':product', $v->getProduto());
        $sql->bindValue(':amount', $v->getQuantidade());
        $sql->bindValue(':status', $v->getStatus());
        $sql->bindValue(':date', $v->getData());
        $sql->bindValue(':total', $v->getTotal());
        $sql->bindValue(':id_produto', $v->getCodigo());
        $sql->execute();
        
    }

    public function edit(Vendas $v){

        $sql = $this->conexao->prepare("UPDATE sale SET date = :date, amount = :amount, total = :total, product = :product, status = :status WHERE id = :id");
        $sql->bindValue(':id', $v->getId());
        $sql->bindValue(':date', $v->getData());
        $sql->bindValue(':amount', $v->getQuantidade());
        $sql->bindValue(':total', $v->getTotal());
        $sql->bindValue(':product', $v->getProduto());
        $sql->bindValue(':status', $v->getStatus());
        $sql->execute();
        
    }

    public function getRelatorio(){
        
        $sql = $this->conexao->query("SELECT seller, count(seller) as qtd, sum(total) as total FROM sale group by seller");

        $data = $sql->fetchAll();

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';*/

        return $data;
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
                $u->setCodigo($item['id_produto']);
                $array[] = $u;
            } 
        }
        return $array;
    }
}