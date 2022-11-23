<?php

require 'conexao.php';
require './dao/DaoUsuarios.php';
session_start();
$Daousuario = new DaoUsuarios($conexao);

$id = filter_input(INPUT_POST, "id");
$email = filter_input(INPUT_POST, "email");
$nome = filter_input(INPUT_POST, "nome");
$senha = filter_input(INPUT_POST, "senha");
$acesso = filter_input(INPUT_POST, "acesso");

//codigo para a tabela nao recarregar apos alguma edição
$_SESSION["flag"] = "usuario";
if ( $email &&  $id && $nome && $senha && $acesso) {
    $usuarios = new Usuarios();
    $usuarios->setId($id);
    $usuarios->setEmail($email);
    $usuarios->setAcesso($acesso);
    $usuarios->setNome($nome);
    $usuarios->setSenha($senha);
    $Daousuario->edit($usuarios);
    header("location: index.php");
    exit;
} else {
    echo 'campos incompletos';
    header("location: editarUsuarios.php");
    exit;
}
