<?php
try {
    $conexao = new PDO("mysql:dbname=stock_management;host=localhost","root","mysql");
}catch(PDOException $e){
    echo 'Deu ruim '.$e->getMessage();
}