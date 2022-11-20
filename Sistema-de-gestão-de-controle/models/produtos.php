<?php
class Produtos{
    private $id;
    private $quantidade;
    private $nome;
    private $valor;

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

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
 
    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }
}
interface produtoDao {
    public function add(Produtos $p);
    public function edit(Produtos $p);
    public function remove($id);
    public function get($id);
    public function getAll();
}