<?php

require './conexao.php';
require './dao/DaoUsuarios.php';

$usuarioDao = new DaoUsuarios($conexao);
$id = filter_input(INPUT_GET, "id");
$usuario = $usuarioDao->get($id);

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
      <h2> Editar Usuarios</h2>

      <form action="editarUsuariosAction.php" method="POST">

        <input type="hidden" name="id" value="<?= $id; ?>" />

        <div class="input-group">
          <label> Nome do usuario</label>
          <input type="text" value="<?= $usuario['name'] ?>" placeholder="nome" name="nome" />
        </div>

        <div class="input-group">
          <label>email</label>
          <input type="text" value="<?= $usuario['email'] ?>" placeholder="email" name="email" />
        </div>

        <div class="input-group">
          <label>Senha</label>
          <input type="text" value="<?= $usuario['password'] ?>" placeholder="senha" name="senha" />
        </div>

        <div class="input-group">
          <label>Nível de acesso</label>
          <input type="text" value="<?= $usuario['acess'] ?>" placeholder="acesso" name="acesso" />
        </div>

        <div class="input-group">
          <button>Enviar</button>
        </div>

      </form>
    </div>
  </div>
</body>
</body>
</html>