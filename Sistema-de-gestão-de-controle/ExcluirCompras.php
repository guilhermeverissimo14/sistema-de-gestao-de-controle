<?php
session_start();
require 'conexao.php';
require './dao/DaoCompras.php';

$compraDao = new DaoCompras($conexao);

$id = filter_input(INPUT_GET, "id");

$sql = $conexao->prepare("delete from purchase where id=:id");
$sql->bindValue(':id', $id);
$sql->execute();

//codigo para a tabela nao recarregar apos alguma edição
$_SESSION["flag"] = "compra";
//codigo para voltar para a pagina de index.php
header("location: index.php");
exit;