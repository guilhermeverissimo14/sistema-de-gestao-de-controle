<?php
require_once "./conexao.php";
class DaoVeiculo{
    public function inclui (vendas $vendas)
    {
        $sql = 'insert into veiculo (idVeiculo,fabricante,modelo,ano,placa) values (?,?,?,?,?);';
        $pst = conexao::getPreparedStatement($sql);
        $pst->bindValue(1, $vendas-> getId());
        $pst->bindValue(2, $vendas-> getFabricante());
        $pst->bindValue(3, $vendas-> getModelo());
        $pst->bindValue(4, $vendas-> getAno());
        $pst->bindValue(5, $vendas-> getPlaca());
        if ($pst->execute())
        {
            return true;
        }else{
            return false;
        }     
    }
}