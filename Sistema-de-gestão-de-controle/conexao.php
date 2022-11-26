<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

try {
    $conexao = new PDO("mysql:dbname=stock_management;host=localhost","root","mysql");
}catch(PDOException $e){
    echo 'Deu ruim '.$e->getMessage();
}