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
      <h2>Cadastro de Compras</h2>

      <form action="adicionarComprasAction.php" method="POST">

        <input type="hidden" name="id" value="<?= $id; ?>" />

        <div class="input-group">
          <label> Nome do produto</label>
          <input type="text" placeholder="nome" name="nome" />
        </div>

        <div class="input-group">
          <label>Quantidade</label>
          <input type="text" placeholder="Quantidade" name="quantidade" />
        </div>

        <div class="input-group">
          <label>Valor</label>
          <input type="text" placeholder="valor" name="valor" />
        </div>

        <div class="input-group">
          <button>Enviar</button>
        </div>

      </form>
    </div>
  </div>
</body>
</html>