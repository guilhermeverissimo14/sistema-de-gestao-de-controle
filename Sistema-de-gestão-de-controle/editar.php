<?php
require 'conexao.php';
require './dao/DaoVendas.php';

$vendaDao = new daoVendas($conexao);
$id = filter_input(INPUT_GET, "id");
$venda = $vendaDao->get($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="editarAction.php">
        <input type="hidden" name="id" value="<?=$venda['id'] ?>" />
        <input type="date" value="<?= $venda['date'] ?>" placeholder="date" name="date" />
        <input type="text" value="<?= $venda['total'] ?>" placeholder="Valor Total" name="total" />
        <input type="text" value="<?= $venda['product'] ?>" placeholder="Nome do produto" name="produto" />
        <input type="text" value="<?= $venda['seller'] ?>" placeholder="Nome Vendedor" name="vendedor" />
        <input type="number" value="<?= $venda['amount'] ?>" placeholder="Quantidade" name="Quantidade" />
        <input type="text" value="<?= $venda['status'] ?>" placeholder="status" name="status" />
        <button>Enviar</button>
    </form>
</body>

</html>