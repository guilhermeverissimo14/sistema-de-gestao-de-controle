<?php

require 'conexao.php';
require './dao/DaoVendas.php';
session_start();

$DaoVenda = new DaoVendas($conexao);

$id = filter_input(INPUT_POST, "id");
$date = filter_input(INPUT_POST, "date");
$total = filter_input(INPUT_POST, "total");
$produto = filter_input(INPUT_POST, "produto");
$quantidade = filter_input(INPUT_POST, "quantidade");
$status = filter_input(INPUT_POST, "status");

$_SESSION["flag"] = "venda";
if ($date  && $total && $produto && $quantidade && $status && $id) {
    $vendas = new Vendas();
    $vendas->setId($id);
    $vendas->setProduto($produto);
    $vendas->setQuantidade($quantidade);
    $vendas->setStatus($status);
    $vendas->setData($date);
    $vendas->setTotal($total);
    $DaoVenda->edit($vendas);
    header("location: index.php");
    exit;
} else {
    echo 'a';
    header("location: editarVendas.php");
    exit;
}
