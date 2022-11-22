<?php

require './conexao.php';
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
  <link rel="stylesheet" href="./assets/css/formulario.css">
</head>

<body>
  <div class="box">
    <div class="img-box" style="border: 1px solid ;">
      <img src="./assets/images/logo3.png">
    </div>
    <div class="form-box" style="border: 1px solid;">
      <h2>Cadastro de Vendas</h2>

      <form action="editarVendasAction.php" method="POST">

        <input type="hidden" name="id" value="<?= $id; ?>" />

        <div class="input-group">
          <label> Data da venda</label>
          <input type="date" value="<?= $venda['date'] ?>" placeholder="data" name="date" />
        </div>

        <div class="input-group">
          <label>Valor Total</label>
          <input type="text" value="<?= $venda['total'] ?>" placeholder="Valor Total" name="total" />
        </div>

        <div class="input-group">
          <label>Nome do produto</label>
          <input type="text" value="<?= $venda['product'] ?>" placeholder="Nome do produto" name="produto" />
        </div>

        <div class="input-group">
          <label>Nome do vendedor</label>
          <input type="text" value="<?= $venda['seller'] ?>" placeholder="Nome do vendedor" name="vendedor" />
        </div>

        <div class="input-group">
          <label>Quantidade</label>
          <input type="number" value="<?= $venda['amount'] ?>" placeholder="Quantidade" name="quantidade" />
        </div>

        <div class="input-group">
          <label>Status</label>
          <input type="text" value="<?= $venda['status'] ?>" placeholder="status" name="status" />
        </div>

        <div class="input-group">
          <button>Enviar</button>
        </div>

      </form>
    </div>
  </div>
</body>

</html>