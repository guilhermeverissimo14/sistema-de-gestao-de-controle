<?php
require 'conexao.php';
require './dao/DaoCompras.php';
require './dao/DaoProdutos.php';
session_start();

$DaoCompra = new DaoCompras($conexao);

$DaoProduto = new DaoProdutos($conexao);

$id = filter_input(INPUT_POST, "id");
$quantidade = filter_input(INPUT_POST, "quantidade");
$nome = filter_input(INPUT_POST, "nome");
$valor = filter_input(INPUT_POST, "valor");

//codigo para a tabela nao recarregar apos alguma edição
$_SESSION["flag"] = "compra";

if ( $quantidade && $nome && $valor) {
    $compras = new Compras();
    $compras->setQuantidade($quantidade);
    $compras->setValor($valor);
    $compras->setNome($nome);
    $DaoCompra->add($compras);
    
    //Adiciona em produto
    $produtos = new Produtos();
    $produtos->setQuantidade($quantidade);
    $produtos->setValor($valor);
    $produtos->setNome($nome);
    $DaoProduto->add($produtos);

    header("location: index.php");
    exit;
} else {
    echo 'campos incompletos';
    header("location: adicionarCompras.php");
    exit;
}
