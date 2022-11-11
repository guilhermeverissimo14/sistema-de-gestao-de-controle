<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">
    <title>Document</title>
</head>
<script src="./assets/js/home.js">

</script>

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
            <a href="#" onclick="tabelaVendas()" class="itens">
                <img src="../Sistema-de-gestão-de-controle/assets/images/vendas.png" alt="vendas">
                Vendas
            </a>

            <a href="#" onclick="tabelaCompras()" class="itens">
                <img src="../Sistema-de-gestão-de-controle/assets/images/compras.png" alt="compras">
                Compras
            </a>

            <a href="#" onclick="tabelaUsuarios()" class="itens">
                <img src="../Sistema-de-gestão-de-controle/assets/images/usuarios.png" alt="usuarios">
                Usuarios
            </a>

            <a href="#" class="itens">
                <img src="../Sistema-de-gestão-de-controle/assets/images/relatorio.png" alt="relatorios">
                Relatorios
            </a>
            <a href="#" onclick="tabelaProdutos()" class="itens">
                <img src="../Sistema-de-gestão-de-controle/assets/images/produtos.png" alt="produtos">
                Produtos
            </a>
        </div>
    </nav>

    <!-- Tabela de vendas -->
    <div id="tb-vendas">
        <table>
            <tr>
                <th>id</th>
                <th>data</th>
                <th>quantidade</th>
                <th>Produto</th>
                <th>vendedor</th>
                <th>total</th>
                <th>status</th>
                <th colspan="2">Ações</th>
            </tr>
            <tr>
                <td>10</td>
                <td>13/11/2022</td>
                <td>20</td>
                <td>calça</td>
                <td>Guilherme</td>
                <td>45,50</td>
                <td>Aprazo</td>
                <td style="background-color: yellow;">
                    <a>
                        <img src="../Sistema-de-gestão-de-controle/assets/images/edit1.png" alt="icone de editar">
                    </a>
                </td>
                <td style="background-color: red;">
                    <a>
                        <img src="../Sistema-de-gestão-de-controle/assets/images/delete1.png" alt="icone de editar">
                    </a>
                </td>
            </tr>
            <tr>
                <td>50</td>
                <td>15/11/2022</td>
                <td>30</td>
                <td>short</td>
                <td>Vanderson</td>
                <td>150,50</td>
                <td>Avista</td>
                <td style="background-color: yellow;">
                    <a>
                        <img src="../Sistema-de-gestão-de-controle/assets/images/edit1.png" alt="icone de editar">
                    </a>
                </td>
                <td style="background-color: red;">
                    <a>
                        <img src="../Sistema-de-gestão-de-controle/assets/images/delete1.png" alt="icone de editar">
                    </a>
                </td>
            </tr>
        </table>
    </div>

    <!-- tabela de compras -->
    <div id="tb-compras">
        <table>
            <tr>
                <th>Id</th>
                <th>Quantidade</th>
                <th>Nome</th>
                <th>Valor</th>
                <th colspan="2">Ações</th>
            </tr>
            <tr>
                <td>10</td>
                <td>02</td>
                <td>caixa 01</td>
                <td>222,20</td>
                <td style="background-color: yellow;">
                    <a>
                        <img src="../Sistema-de-gestão-de-controle/assets/images/edit1.png" alt="icone de editar">
                    </a>
                </td>
                <td style="background-color: red;">
                    <a>
                        <img src="../Sistema-de-gestão-de-controle/assets/images/delete1.png" alt="icone de editar">
                    </a>
                </td>
            </tr>
        </table>
    </div>

     <!-- tabela de usuarios -->
     <div id="tb-usuario">
        <table>
            <tr>
                <th>Id</th>
                <th>email</th>
                <th>nome</th>
                <th>senha</th>
                <th>acesso</th>
                <th colspan="2">Ações</th>
            </tr>
            <tr>
                <td>15</td>
                <td>guilherme14@gmail.com</td>
                <td>guilherme</td>
                <td>12345</td>
                <td>1</td>
                <td style="background-color: yellow;">
                    <a>
                        <img src="../Sistema-de-gestão-de-controle/assets/images/edit1.png" alt="icone de editar">
                    </a>
                </td>
                <td style="background-color: red;">
                    <a>
                        <img src="../Sistema-de-gestão-de-controle/assets/images/delete1.png" alt="icone de editar">
                    </a>
                </td>
            </tr>
        </table>
    </div>

       <!-- tabela de prudutos -->
       <div id="tb-produto">
        <table>
            <tr>
                <th>Id</th>
                <th>quantidade</th>
                <th>nome</th>
                <th>valor</th>
                <th colspan="2">Ações</th>
            </tr>
            <tr>
                <td>55</td>
                <td>30</td>
                <td>caixa03</td>
                <td>350,01</td>
                <td style="background-color: yellow;">
                    <a>
                        <img src="../Sistema-de-gestão-de-controle/assets/images/edit1.png" alt="icone de editar">
                    </a>
                </td>
                <td style="background-color: red;">
                    <a>
                        <img src="../Sistema-de-gestão-de-controle/assets/images/delete1.png" alt="icone de editar">
                    </a>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>