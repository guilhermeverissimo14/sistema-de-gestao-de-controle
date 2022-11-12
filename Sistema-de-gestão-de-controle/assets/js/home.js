function abrirMenu() {
    document.getElementById('menu').style.width = '15%';
}
function fecharMenu() {
    document.getElementById('menu').style.width = '0px';
}
function tabelaVendas() {
    fecharTabelas();
    document.getElementById('tb-vendas').style.display = 'block';
}
function tabelaCompras() {
    fecharTabelas();
    document.getElementById('tb-compras').style.display = 'block';
}
function tabelaUsuarios() {
    fecharTabelas();
    document.getElementById('tb-usuario').style.display = 'block';
}
function tabelaProdutos() {
    fecharTabelas();
    document.getElementById('tb-produto').style.display = 'block';
}
function fecharTabelas(){
    document.getElementById('tb-vendas').style.display = 'none';
    document.getElementById('tb-usuario').style.display = 'none';
    document.getElementById('tb-produto').style.display = 'none';
    document.getElementById('tb-compras').style.display = 'none';
}