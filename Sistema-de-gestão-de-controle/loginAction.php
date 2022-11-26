<?php
require_once "./conexao.php";
$email = filter_input(INPUT_POST, "email");
$senha = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);
if ($senha && $email) {
    $login = [];
    $sql = $conexao->query("select * from user where email = $email");
    if ($sql->rowCount() > 0) {
        $login = $sql->fetch();
        echo "Deu bom";
    }
    echo "email e/ou senha estão incorretos";
} else {
    echo 'email e/ou senha estão vazios';
}
