<?php
require_once "./conexao.php";
$email = filter_input(INPUT_POST, "email");
$senha = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);
if ($senha && $email){
    $sql = $conexao->prepare("select * from user where email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();
    echo $sql->rowCount(); 
}else{
    echo 'email e/ou senha estão vazios';
}
