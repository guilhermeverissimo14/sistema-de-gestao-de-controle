<?php
require "conexao.php";
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
    <div class="img-box" style="border: 1px solid transparent;">
      <img src="./assets/images/logo3.png">
    </div>
    <div class="form-box" style="border: 1px solid transparent;">
      <h2>Cadastro de Vendas</h2>

      <form action="adicionarVendasAction.php" method="POST">

        <div class="input-group">
          <label> Data da venda</label>
          <input type="date" placeholder="data" name="date" />
        </div>

        <div class="input-group">
          <label>Valor Total</label>
          <input type="text" placeholder="Valor Total" name="total" />
        </div>

        <div class="input-group">
          <label>Nome do produto</label>
          <input type="text"  placeholder="Nome do produto" name="produto" />
        </div>

        <div class="input-group">
          <label>Nome do vendedor</label>
          <select name="vendedor" required>
            <option value="">Selecione um Vendedor</option>
            <?php
            $sql = $conexao->query('SELECT name FROM user');
            $vendedoresLista = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($vendedoresLista as $option) {
              ?>
              <option value="<?php echo $option['name']?>">
                <?php echo $option['name']; ?>
              </option>
              <?php
            }
            ?>
          </select>
        </div>

        <div class="input-group">
          <label>Quantidade</label>
          <input type="number"  placeholder="Quantidade" name="quantidade" />
        </div>

        <div class="input-group">
          <label>Status</label>
          <input type="text"  placeholder="status" name="status" />
        </div>

        <div class="input-group">
          <button>Enviar</button>
        </div>

      </form>
    </div>
  </div>
</body>

</html>