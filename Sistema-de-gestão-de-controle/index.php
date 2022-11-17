<!DOCTYPE html>
<?php
require_once './conexao.php';
require_once 'dao/DaoVendas.php';
require_once 'dao/DaoCompras.php';
require_once 'dao/DaoProdutos.php';
require_once 'dao/DaoUsuarios.php';
?>
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

    <!-- Menu lateral -->
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

    <?php
    $vendaDao = new daoVendas($conexao);
    $lista = $vendaDao->getAll();
    ?>

    <!-- Tabela de vendas -->
    <div class="container">
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

                <?php foreach ($lista as $item) : ?>
                    <tr>
                        <td><?= $item->getId() ?></td>
                        <td><?= $item->getData() ?></td>
                        <td><?= $item->getQuantidade() ?></td>
                        <td><?= $item->getProduto() ?></td>
                        <td><?= $item->getVendedor() ?></td>
                        <td><?= $item->getTotal() ?></td>
                        <td><?= $item->getStatus() ?></td>
                        <td style="background-color: yellow;">
                            <a href="editar.php?id=<?php echo $item -> getId () ?>">
                                <img src="../Sistema-de-gestão-de-controle/assets/images/edit1.png" alt="icone de editar">
                            </a>
                        </td>
                        <td style="background-color: red;">
                            <a href="ExcluirVendas.php?id=<?php echo $item -> getId () ?>" >
                                <img src="../Sistema-de-gestão-de-controle/assets/images/delete1.png" alt="icone de editar">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <?php
        $CompraDAO = new DaoCompras($conexao);
        $lista = $CompraDAO->getAll();
        ?>

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
                <?php foreach ($lista as $item) : ?>
                    <tr>
                        <td><?= $item->getId() ?></td>
                        <td><?= $item->getQuantidade() ?></td>
                        <td><?= $item->getNome() ?></td>
                        <td><?= $item->getValor() ?></td>
                        <td style="background-color: yellow;">
                            <a>
                                <img src="../Sistema-de-gestão-de-controle/assets/images/edit1.png" alt="icone de editar">
                            </a>
                        </td>
                        <td style="background-color: red;">
                            <a  href="ExcluirCompras.php?id=<?php echo $item -> getId () ?>">
                                <img src="../Sistema-de-gestão-de-controle/assets/images/delete1.png" alt="icone de editar">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <?php
        $usuarioDao = new DaoUsuarios($conexao);
        $lista = $usuarioDao->getAll();
        ?>

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

                <?php foreach ($lista as $item) : ?>
                    <tr>
                        <td><?= $item->getId() ?></td>
                        <td><?= $item->getEmail() ?></td>
                        <td><?= $item->getNome() ?></td>
                        <td><?= $item->getSenha() ?></td>
                        <td><?= $item->getAcesso() ?></td>
                        <td style="background-color: yellow;">
                            <a>
                                <img src="../Sistema-de-gestão-de-controle/assets/images/edit1.png" alt="icone de editar">
                            </a>
                        </td>
                        <td style="background-color: red;">
                            <a  href="ExcluirUsuarios.php?id=<?php echo $item -> getId () ?>">
                                <img src="../Sistema-de-gestão-de-controle/assets/images/delete1.png" alt="icone de editar">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <?php
        $produtoDao = new DaoProdutos($conexao);
        $lista = $produtoDao->getAll();
        ?>

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
                <?php foreach ($lista as $item) : ?>
                    <tr>
                        <td><?= $item->getId() ?></td>
                        <td><?= $item->getQuantidade() ?></td>
                        <td><?= $item->getNome() ?></td>
                        <td><?= $item->getValor() ?></td>
                        <td style="background-color: yellow;">
                            <a>
                                <img src="../Sistema-de-gestão-de-controle/assets/images/edit1.png" alt="icone de editar">
                            </a>
                        </td>
                        <td style="background-color: red;">
                            <a href="ExcluirProdutos.php?id=<?php echo $item -> getId () ?>">
                                <img src="../Sistema-de-gestão-de-controle/assets/images/delete1.png" alt="icone de editar">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>