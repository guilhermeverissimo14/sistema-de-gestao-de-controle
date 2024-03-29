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

<!-- mascara para dinheiro -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js" type="text/javascript"></script>

<script>
  jQuery(function() {

    jQuery("#valor").maskMoney({
      thousands: '.',
      decimal: '.'
    })

  });
</script>

<body>
  <div class="box">
    <div class="img-box" style="border: 1px solid transparent;">
      <img src="./assets/images/logo3.png">
    </div>
    <div class="form-box" style="border: 1px solid transparent;">
      <h2>Editar Vendas</h2>

      <form action="editarVendasAction.php" method="POST">

        <input type="hidden" name="id" value="<?= $id; ?>" />

        <div class="input-group">
          <label> Data da venda</label>
          <input type="date" value="<?= $venda['date'] ?>" placeholder="data" name="date" />
        </div>

        <div class="input-group">
          <label>Valor Total</label>
          <input id="valor" type="text" value="<?= $venda['total'] ?>" placeholder="Valor Total" name="total" />
        </div>

        <div class="input-group">
          <label>Nome do produto</label>
          <input type="text" value="<?= $venda['product'] ?>" placeholder="Nome do produto" name="produto" />
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