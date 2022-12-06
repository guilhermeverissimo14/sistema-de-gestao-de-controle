<?php

require './models/usuarios.php';

class DaoUsuarios implements usuarioDao{
    private $conexao;

    public function __construct(PDO $driver) {
        $this->conexao = $driver;
    }

    public function add(Usuarios $u){
        $sql = $this->conexao->prepare("INSERT user (email, password, name, acess, token) VALUES (:email, :password, :name, :acess, :token)");
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':name', $u->getNome());
        $sql->bindValue(':token', $u->getToken());
        $sql->bindValue(':password', $u->getSenha());
        $sql->bindValue(':acess', $u->getAcesso());
        $sql->execute();
    }

    public function edit(Usuarios $u){
        echo 'atualiza o id: '.$u->getId().' com o nomed agora sendo '.$u->getNome();

        $sql = $this->conexao->prepare("UPDATE user SET email = :email, password = :password, name = :name, acess = :acess  WHERE id = :id");
        $sql->bindValue(':id', $u->getId());
        
        if($u->getEmail()) $sql->bindValue(':email', $u->getEmail());
        if($u->getNome()) $sql->bindValue(':name', $u->getNome());
        if($u->getSenha()) $sql->bindValue(':password', $u->getSenha());
        if($u->getAcesso()) $sql->bindValue(':acess', $u->getAcesso());
        $sql->execute();
    }

    public function autenticacao($token){
        $data = [];
        $sql = $this->conexao->prepare("SELECT * FROM user WHERE token = :token");
        $sql->bindValue(':token', $token);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();
        }
        
        return $data;
    }

    public function remove($id){
        
    }

    public function get($id){
        $data = [];
        $sql = $this->conexao->query("SELECT * FROM user WHERE id = $id");
        if($sql->rowCount() > 0){
            $data = $sql->fetch();
        }
        return $data;
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