<?php

require 'conexao.php';
require './dao/DaoUsuarios.php';
session_start();



ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

$Daousuario = new DaoUsuarios($conexao);

$email = filter_input(INPUT_POST, "email");
$nome = filter_input(INPUT_POST, "nome");
$senha = filter_input(INPUT_POST, "senha");
$acesso = filter_input(INPUT_POST, "acesso");

//codigo para a tabela nao recarregar apos alguma edição
$_SESSION["flag"] = "usuario";
if ( $email && $nome && $senha && $acesso) {

    //gerar token automaticamente
    $token = md5(time().rand(0,9999).rand(0,9999));

    $usuarios = new Usuarios();
    $usuarios->setEmail($email);
    $usuarios->setAcesso($acesso);
    $usuarios->setToken($token);
    $usuarios->setNome($nome);
    $usuarios->setSenha($senha);
    $Daousuario->add($usuarios);
    header("location: index.php");
    exit;
} else {
    echo 'campos incompletos';
    header("location: adicionarUsuarios.php");
    exit;
}
