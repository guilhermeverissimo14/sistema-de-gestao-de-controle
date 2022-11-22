<?php
require 'conexao.php';
require './dao/DaoVendas.php';

$vendaDao = new daoVendas($conexao);

$id = filter_input(INPUT_GET, "id");

$sql = $conexao->prepare("delete from sale where id=:id");
$sql->bindValue(':id', $id);
$sql->execute();

//codigo para voltar para a pagina de index.php
$_SESSION["flag"] = "vendas";
header("location: index.php");
exit;