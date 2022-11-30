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
    if(acesso >= 2){
        alert('Você não tem permissão!! obs: somente o gerente pode acessar essa página!');
        return false;
    }
    fecharTabelas();
    document.getElementById('tb-compras').style.display = 'block';
}
function tabelaUsuarios() {
    if(acesso >= 2){
        alert('Você não tem permissão!! obs: somente o gerente pode acessar essa página!');
        return false;
    }
    fecharTabelas();
    document.getElementById('tb-usuario').style.display = 'block';
}
function tabelaProdutos() {
    if(acesso >= 2){
        alert('Você não tem permissão!! obs: somente o gerente pode acessar essa página!');
        return false;
    }
    fecharTabelas();
    document.getElementById('tb-produto').style.display = 'block';
}
function tabelaRelatorios(){
    if(acesso >= 2){
        alert('Você não tem permissão!! obs: somente o gerente pode acessar essa página!');
        return false;
    }
    fecharTabelas();
    document.getElementById('tb-relatorios').style.display = 'block';
}
function fecharTabelas(){
    document.getElementById('tb-vendas').style.display = 'none';
    document.getElementById('tb-usuario').style.display = 'none';
    document.getElementById('tb-produto').style.display = 'none';
    document.getElementById('tb-compras').style.display = 'none';
    document.getElementById('tb-relatorios').style.display = 'none';
    document.getElementById('img-logo').style.display = 'none';
}

