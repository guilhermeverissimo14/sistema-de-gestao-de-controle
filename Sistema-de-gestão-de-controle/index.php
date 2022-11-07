<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">
    <title>Document</title>
    <script>
        function abrirMenu() {
            document.getElementById('menu').style.width = '15%'
        }

        function fecharMenu() {
            document.getElementById('menu').style.width = '0px';
        }
    </script>
</head>

<body>
    <header>
        <a href="#" class="btn-abrir" onclick="abrirMenu()"> &#9776;</a>
        <h2>Sistema de gestão de controle</h2>
    </header>
    <nav id="menu">
        <a href="#" onclick="fecharMenu()">&times;</a>
        <a href="#">Vendas</a>
        <a href="#">Compras</a>
        <a href="#">Usuarios</a>
        <a href="#">Relatorios</a>
        <a href="#">Produtos</a>
    </nav>

</body>

</html>