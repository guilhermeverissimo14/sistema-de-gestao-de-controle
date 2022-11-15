<?php

require './models/usuarios.php';

class DaoUsuarios implements usuarioDao{
    private $conexao;

    public function __construct(PDO $driver) {
        $this->conexao = $driver;
    }

    public function add(Usuarios $u){

    }

    public function edit($id){

    }

    public function remove($id){

    }

    public function get($id){

    }

    public function getAll(){
        $array = [];

        $sql = $this->conexao->query("SELECT * FROM user");
        
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();
            
            foreach($data as $item){
                $a = new Usuarios();
                $a->setId($item['id']);
                $a->setNome($item['name']);
                $a->setAcesso($item['acess']);
                $a->setSenha($item['password']);
                $a->setEmail($item['email']);
                $array[] = $a;
            } 
        }

        return $array;
    }
}