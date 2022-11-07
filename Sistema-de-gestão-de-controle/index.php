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
        <div>
            <a href="#" class="btn-abrir" onclick="abrirMenu()"> &#9776;</a>
        </div>
        <div>
            <h2>Sistema de gestão de controle</h2>
        </div>
    </header>
    <nav id="menu">
        <a style="font-size: 50px;" href="#" onclick="fecharMenu()">&times;</a>
        <div class="nav-1">
            <img src="../Sistema-de-gestão-de-controle/assets/images/logo.png" alt="logo">
                <a href="#" class="itens">
                    <img src="../Sistema-de-gestão-de-controle/assets/images/vendas.png" alt="vendas">
                    Vendas
                </a>

                <a href="#" class="itens">
                    <img src="../Sistema-de-gestão-de-controle/assets/images/compras.png" alt="compras">
                    Compras
                </a>

                <a href="#" class="itens">
                    <img src="../Sistema-de-gestão-de-controle/assets/images/usuarios.png" alt="usuarios">
                    Usuarios
                </a>

                <a href="#" class="itens">
                    <img src="../Sistema-de-gestão-de-controle/assets/images/relatorio.png" alt="relatorios">
                    Relatorios
                </a>
                <a href="#" class="itens">
                    <img src="../Sistema-de-gestão-de-controle/assets/images/produtos.png" alt="produtos">
                    Produtos
                </a>
        </div>
    </nav>

</body>

</html>