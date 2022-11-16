<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
  <div class="container right-panel-active">
    <!-- Entrar -->
    <div class="container__form container--signup">
      <form class="form" id="form1" method="POST" action="loginAction.php">
        <h2 class="form__title">Login</h2>
        <input type="text"  placeholder="Email" name="email" class="input" required/>
        <input type="password" placeholder="Senha" name="pass" class="input" required>
        <button class="btn">Entrar</button>
      </form>
    </div>
    
    <!-- sobreposição -->
    <div class="container__overlay">
      <div class="overlay">
        <img src="../Sistema-de-gestão-de-controle/assets/images/logo3.png" >
      </div>
    </div>
  </div>
</body>

</html>
</html>