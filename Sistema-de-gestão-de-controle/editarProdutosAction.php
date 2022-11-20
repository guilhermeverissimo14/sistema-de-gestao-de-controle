<?php

require 'conexao.php';
require './dao/DaoProdutos.php';

$Daoproduto = new DaoProdutos($conexao);

$id = filter_input(INPUT_POST, "id");
$quantidade = filter_input(INPUT_POST, "quantidade");
$nome = filter_input(INPUT_POST, "nome");
$valor = filter_input(INPUT_POST, "valor");


if ( $quantidade &&  $id && $nome && $valor) {
    $produtos = new Produtos();
    $produtos->setId($id);
    $produtos->setQuantidade($quantidade);
    $Daoproduto->edit($produtos);
    $produtos->setValor($valor);
    $Daoproduto->edit($produtos);
    $produtos->setNome($nome);
    $Daoproduto->edit($produtos);
    header("location: index.php");
    exit;
} else {
    echo 'campos incompletos';
    header("location: editarProdutos.php");
    exit;
}
