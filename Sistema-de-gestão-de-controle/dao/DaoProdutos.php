<?php

require './models/produtos.php';

class DaoProdutos implements produtoDao
{
    private $conexao;

    public function __construct(PDO $driver)
    {
        $this->conexao = $driver;
    }

    public function add(Produtos $p)
    {
        echo 'com o quantidade agora sendo ' . $p->getQuantidade();
        $sql = $this->conexao->prepare("INSERT product (amount, price, name) VALUES (:amount, :price, :name)");
        $sql->bindValue(':amount', $p->getQuantidade());
        $sql->bindValue(':name', $p->getNome());
        $sql->bindValue(':price', $p->getValor());
        $sql->execute();
    }

    public function edit(Produtos $p)
    {
        echo 'atualiza o id: ' . $p->getId() . ' com o quantidade agora sendo ' . $p->getQuantidade();

        $sql = $this->conexao->prepare("UPDATE product SET amount = :amount, price = :price, name = :name  WHERE id = :id");
        $sql->bindValue(':id', $p->getId());
        $sql->bindValue(':amount', $p->getQuantidade());
        $sql->bindValue(':name', $p->getNome());
        $sql->bindValue(':price', $p->getValor());
        $sql->execute();
    }

    public function remove($id)
    {
        $sql = $this->conexao->prepare("DELETE FROM product WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function get($id)
    {
        $data = [];
        $sql = $this->conexao->query("SELECT * FROM product WHERE id = $id");
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
        }
        return $data;
    }

    public function getAll()
    {
        $array = [];

        $sql = $this->conexao->query("SELECT * FROM product ");

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $item) {
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
