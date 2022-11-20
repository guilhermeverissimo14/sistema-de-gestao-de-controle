<?php

require 'conexao.php';
require './dao/DaoCompras.php';

$DaoCompra = new DaoCompras($conexao);

$id = filter_input(INPUT_POST, "id");
$quantidade = filter_input(INPUT_POST, "quantidade");
$nome = filter_input(INPUT_POST, "nome");


if ( $quantidade &&  $id && $nome) {
    $compras = new Compras();
    $compras->setId($id);
    $compras->setQuantidade($quantidade);
    $DaoCompra->edit($compras);
    header("location: index.php");
    exit;
} else {
    echo 'campos incompletos';
    header("location: editarCompras.php");
    exit;
}
