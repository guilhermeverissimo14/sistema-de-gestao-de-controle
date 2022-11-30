<?php
session_start();
require_once './conexao.php';
require_once 'dao/DaoVendas.php';
require_once 'dao/DaoCompras.php';
require_once 'dao/DaoProdutos.php';
require_once 'dao/DaoUsuarios.php';

if(empty($_SESSION['token'])){
    header("location:login.php");
    exit;
}

$usuarioDao = new DaoUsuarios($conexao);
$usuarioLogado = $usuarioDao->autenticacao($_SESSION['token']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Document</title>
</head>

<body>
    <header>
        <a href="#" class="btn-abrir" onclick="abrirMenu()">&#9776;</a>
        <a href="sair.php" onClick="return confirm('Você tem certeza?');">Sair
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
                <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z" />
            </svg>

        </a>
        <h2>Sistema de gestão de controle </h2>
        <!-- //$usuarioLogado['acess'] -->

    </header>
    
    <!-- logo da loja -->
    <div id="img-logo" class="img">
        <img src="../Sistema-de-gestão-de-controle/assets/images/logo4.png" alt="logo">
    </div>

    <!-- Menu lateral -->
    <nav id="menu">
        <a class="btn-fechar" style="font-size: 50px;" href="#" onclick="fecharMenu()">&times;</a>
        <div class="nav-1">

            <div class="imgBox">
                <img src="../Sistema-de-gestão-de-controle/assets/images/logo.png" alt="logo">
            </div>

            <div class="opcaoMenu">
                <a href="#" onclick="tabelaVendas()" class="itens">
                    <img src="../Sistema-de-gestão-de-controle/assets/images/vendas.png" alt="vendas">
                    Vendas
                </a>

                <a href="#" onclick="tabelaCompras()" class="itens bloquear">
                    <img src="../Sistema-de-gestão-de-controle/assets/images/compras.png" alt="compras">
                    Compras
                </a>

                <a href="#" onclick="tabelaUsuarios()" class="itens bloquear">
                    <img src="../Sistema-de-gestão-de-controle/assets/images/usuarios.png" alt="usuarios">
                    Usuarios
                </a>

                <a href="#" class="itens bloquear">
                    <img src="../Sistema-de-gestão-de-controle/assets/images/relatorio.png" alt="relatorios">
                    Relatorios
                </a>
                <a href="#" onclick="tabelaProdutos()" class="itens bloquear">
                    <img src="../Sistema-de-gestão-de-controle/assets/images/produtos.png" alt="produtos">
                    Produtos
                </a>
            </div>
        </div>
    </nav>


    <?php
    $vendaDao = new daoVendas($conexao);
    $lista = $vendaDao->getAll();
    ?>

    <div class="container">
        <div id="tb-vendas">
            <h1>Tabela de vendas</h1>
            <a class="adicionar" href="adicionarVendas.php">Adicionar</a>
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
                        <td>
                            <a style="background-color:yellow; border-radius:20px; padding:5px;" href="editarVendas.php?id=<?php echo $item->getId() ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a style="background-color:blue; border-radius:20px; padding:5px;" href="ExcluirVendas.php?id=<?php echo $item->getId() ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg>
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
            <h1>Tabela de compras</h1>
            <a class="adicionar" href="adicionarCompras.php">Adicionar</a>
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
                        <td>
                            <a  style="background-color:yellow; border-radius:20px; padding:5px;" href="editarCompras.php?id=<?php echo $item->getId() ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a style="background-color:blue; border-radius:20px; padding:5px;" href="ExcluirCompras.php?id=<?php echo $item->getId() ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg>
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
            <h1>Tabela de Usuários</h1>
            <a class="adicionar" href="adicionarUsuarios.php">Adicionar</a>
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
                        <td>
                            <a  style="background-color:yellow; border-radius:20px; padding:5px;" href="editarUsuarios.php?id=<?php echo $item->getId() ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a style="background-color:blue; border-radius:20px; padding:5px;" href="ExcluirUsuarios.php?id=<?php echo $item->getId() ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg>
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
            <h1>Tabela de produtos</h1>
            <a class="adicionar" href="adicionarProdutos.php">Adicionar</a>
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
                        <td>
                            <a  style="background-color:yellow; border-radius:20px; padding:5px;" href="editarProdutos.php?id=<?php echo $item->getId() ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a style="background-color:blue; border-radius:20px; padding:5px;" href="ExcluirProdutos.php?id=<?php echo $item->getId() ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div id="tb-relatorios">
            <table>
                <tr>
                    <th>Quantidade</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th colspan="2">Ações</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

<?php
if (isset($_SESSION['flag'])) {

    if ($_SESSION["flag"] === 'venda') {
        echo "<script> 
        abrirMenu();
        tabelaVendas();
        </script>";
    } else if ($_SESSION["flag"] === 'compra') {
        echo "<script> 
        abrirMenu();
        tabelaCompras();
        </script>";
    } else if ($_SESSION["flag"] === 'usuario') {
        echo "<script> 
        abrirMenu();
        tabelaUsuarios();
        </script>";
    } else if ($_SESSION["flag"] === 'produto') {
        echo "<script> 
        abrirMenu();
        tabelaProdutos();
        </script>";
    }
    $_SESSION['flag'] = false;
}
?>
<script>
    let acesso = '<?php echo $usuarioLogado["acess"]; ?>';
</script>

<script src="./assets/js/home.js">

</script>

</html>