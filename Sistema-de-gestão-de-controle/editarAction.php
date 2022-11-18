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
    $vendas = new Vendas();
    $vendas->setVendedor('guilherme');
    $DaoVenda->edit($vendas); 
    header("location: index.php");
    exit;
} else {
    header("location: editar.php");
    exit;
}
