<?php
require 'conexao.php';
require './dao/DaoVendas.php';

$DaoVenda = new DaoVendas($conexao);

$id = filter_input(INPUT_POST, "id");
$date = filter_input(INPUT_POST, "date");
$total = filter_input(INPUT_POST, "total");
$produto = filter_input(INPUT_POST, "produto");
$quantidade = filter_input(INPUT_POST, "quantidade");
$vendedor = filter_input(INPUT_POST, "vendedor");
$status = filter_input(INPUT_POST, "status");

if ($date  && $total && $produto && $quantidade && $vendedor && $status) {
    // $venda = $DaoVenda->get($id); 
    // $venda->setData();
    // $venda->setTotal();
    // $venda->setQuantidade();
    // $venda->setVendedor();
    // $venda->setStatus();
    // $venda->setProduto();
    // $DaoVenda-> edit($venda);
    $sql = $this->conexao->prepare("UPDATE sale SET date=:date, seller = :seller, product = :product, total = :total, amount = :amount, status = :status WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':date', $date);
    $sql->bindValue(':seller', $vendedor);
    $sql->bindValue(':product', $produto);
    $sql->bindValue(':total', $total);
    $sql->bindValue(':amount', $quantidade);
    $sql->bindValue(':status', $status);
    $sql->execute();
    header("location: index.php");
    exit;
} else {
    header("location: editar.php");
    exit;
}
