<?php
require 'conexao.php';
require './dao/DaoUsuarios.php';

$usuarioDao = new DaoUsuarios($conexao);

$id = filter_input(INPUT_GET, "id");

$sql = $conexao->prepare("delete from user where id=:id");
$sql->bindValue(':id', $id);
$sql->execute();

//codigo para voltar para a pagina de index.php

header("location: index.php");
exit;