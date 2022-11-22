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

if ($date  && $total && $produto && $quantidade && $vendedor && $status && $id) {
    $vendas = new Vendas();
    $vendas->setId($id);
    $vendas->setVendedor($vendedor);
    $vendas->setProduto($produto);
    $vendas->setQuantidade($quantidade);
    $vendas->setStatus($status);
    $vendas->setData($date);
    $vendas->setTotal($total);
    $DaoVenda->add($vendas);

    header("location: index.php");
    exit;
} else {
    echo 'campos incompletos';
    header("location: editarVendas.php");
    exit;
}
