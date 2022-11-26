<?php
require_once "./conexao.php";
session_start();

$email = filter_input(INPUT_POST, "email");
$senha = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);

if ($senha && $email) {

    $login = [];
    $sql = $conexao->prepare("SELECT * FROM user WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $login = $sql->fetch();
        
        if($login['password'] == $senha) {
            $_SESSION['token'] = $login['token'];
            header('Location: index.php');
            exit;
        }
    }

    $_SESSION["flash"] = "Email e/ou senha estão incorretos.";
    $_SESSION["flag"] = "produto";
    header('Location: index.php');
    exit;
} else {
    $_SESSION["flash"] = 'Email e/ou senha estão vazios.';
    echo "email e ou senha vazios";
    header('Location: index.php');
    exit;
}
