<?php

require './conexao.php';
require './dao/DaoCompras.php';

$compraDao = new DaoCompras($conexao);
$id = filter_input(INPUT_GET, "id");
$compra = $compraDao->get($id);

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
    <div class="img-box" style="border: 1px solid transparent ;">
      <img src="./assets/images/logo3.png">
    </div>
    <div class="form-box" style="border: 1px solid transparent;">
      <h2>Editar Compras</h2>

      <form action="editarComprasAction.php" method="POST">

        <input type="hidden" name="id" value="<?= $id; ?>" />

        <div class="input-group">
          <label> Nome do produto</label>
          <input type="text" value="<?= $compra['name_product'] ?>" placeholder="nome" name="nome" />
        </div>

        <div class="input-group">
          <label>Quantidade</label>
          <input type="text" value="<?= $compra['amount'] ?>" placeholder="Quantidade" name="quantidade" />
        </div>

        <div class="input-group">
          <label>Valor</label>
          <input type="text" value="<?= $compra['value'] ?>" placeholder="valor" name="valor" />
        </div>

        <div class="input-group">
          <button>Enviar</button>
        </div>

      </form>
    </div>
  </div>
</body>
</html>