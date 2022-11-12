<?php
require_once "./vendas.php";
require_once "./conexao.php";
class DaoVendas implements vendasDao{
    private $pdo;
    public function __construct(PDO $driver)
    {
      $this->pdo = $driver;  
    }
    public function addVendas(Vendas $v);
    public function pegaTodas();


}