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
    $DaoVenda->edit($vendas);
    $vendas->setProduto($produto);
    $DaoVenda->edit($vendas);
    $vendas->setQuantidade($quantidade);
    $DaoVenda->edit($vendas);
    $vendas->setStatus($status);
    $DaoVenda->edit($vendas);
    $vendas->setData($date);
    $DaoVenda->edit($vendas);
    $vendas->setTotal($total);
    $DaoVenda->edit($vendas);

    header("location: index.php");
    exit;
} else {
    echo 'campos incompletos';
    header("location: editar.php");
    exit;
}
