<?php
try {
    $conexao = new PDO("mysql:dbname=stock_management;host=localhost","root","");
}catch(PDOException $e){
    echo 'Deu ruim '.$e->getMessage();
}