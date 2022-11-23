<?php
require 'conexao.php';
require './dao/DaoProdutos.php';
session_start();

$Daoproduto = new DaoProdutos($conexao);

$id = filter_input(INPUT_POST, "id");
$quantidade = filter_input(INPUT_POST, "quantidade");
$nome = filter_input(INPUT_POST, "nome");
$valor = filter_input(INPUT_POST, "valor");

//codigo para a tabela nao recarregar apos alguma edição
$_SESSION["flag"] = "produto";
if ( $quantidade &&  $id && $nome && $valor) {
    $produtos = new Produtos();
    $produtos->setId($id);
    $produtos->setQuantidade($quantidade);
    $produtos->setValor($valor);
    $produtos->setNome($nome);
    $Daoproduto->edit($produtos);
    header("location: index.php");
    exit;
} else {
    echo 'campos incompletos';
    header("location: editarProdutos.php");
    exit;
}
