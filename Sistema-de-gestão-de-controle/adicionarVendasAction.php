<?php

require 'conexao.php';
require './dao/DaoVendas.php';
require './dao/DaoProdutos.php';
session_start();

$DaoVenda = new DaoVendas($conexao);
$DaoProduto = new DaoProdutos($conexao);

$id = filter_input(INPUT_POST, "id");
$date = filter_input(INPUT_POST, "date");
$total = filter_input(INPUT_POST, "total");
$produtoI = filter_input(INPUT_POST, "produto");
$quantidade = filter_input(INPUT_POST, "quantidade");
$vendedor = filter_input(INPUT_POST, "vendedor");
$status = filter_input(INPUT_POST, "status");
$codigo = filter_input(INPUT_POST, "codigoP");

//codigo para a tabela nao recarregar apos alguma edição
$_SESSION["flag"] = "venda";

if ($date  && $total && $produtoI && $quantidade && $vendedor && $status && $codigo) {
    //Remove em produto
    $produto = new Produtos();
    $produto->setId($codigo);
    $produto->setQuantidade($quantidade);
    $teste = $DaoProduto->reduzEstoque($produto);

    if ($teste) {
        $vendas = new Vendas();
        $vendas->setVendedor($vendedor);
        $vendas->setProduto($produtoI);
        $vendas->setQuantidade($quantidade);
        $vendas->setStatus($status);
        $vendas->setData($date);
        $vendas->setTotal($total);
        $vendas->setCodigo($codigo);
        $DaoVenda->add($vendas);
        header("location: index.php");
        exit;
    } else {
        $_SESSION["errorProduto"] = "Produto não encontrado ou Quantidade nao disponivel";
        header("location: adicionarVendas.php");
        exit;
    }

} else {
    header("location: adicionarVendas.php");
    exit;
}
