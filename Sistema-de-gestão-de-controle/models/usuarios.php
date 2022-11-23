<?php
class Usuarios{
    private $id;
    private $email;
    private $nome;
    private $acesso;
    private $senha;

    public function getId()
    {
        return $this->id;
    }
 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
 
    public function getEmail()
    {
        return $this->email;
    }
 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getAcesso()
    {
        return $this->acesso;
    }

    public function setAcesso($acesso)
    {
        $this->acesso = $acesso;

        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
}
interface usuarioDAO {
    public function add(Usuarios $u);
    public function edit(Usuarios $u);
    public function remove($id);
    public function get($id);
    public function getAll();
}