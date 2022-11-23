<?php
require 'conexao.php';
require './dao/DaoProdutos.php';
session_start();
$produtoDao = new DaoProdutos($conexao);

$id = filter_input(INPUT_GET, "id");

$sql = $conexao->prepare("delete from product where id=:id");
$sql->bindValue(':id', $id);
$sql->execute();

//codigo para a tabela nao recarregar apos alguma edição
$_SESSION["flag"] = "produto";
header("location: index.php");
exit;