<?php
try {
    $conexao = new PDO("mysql:dbname=stock_management;host=localhost","root","12345");
}catch(PDOException $e){
    echo 'Deu ruim '.$e->getMessage();
}