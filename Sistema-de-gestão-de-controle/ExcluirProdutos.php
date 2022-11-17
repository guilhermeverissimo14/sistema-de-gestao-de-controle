<?php
require 'conexao.php';
require './dao/DaoProdutos.php';

$produtoDao = new DaoProdutos($conexao);

$id = filter_input(INPUT_GET, "id");

$sql = $conexao->prepare("delete from product where id=:id");
$sql->bindValue(':id', $id);
$sql->execute();

//codigo para voltar para a pagina de index.php

header("location: index.php");
exit;