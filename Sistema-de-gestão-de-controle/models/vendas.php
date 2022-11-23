<?php

class Vendas{
    private $id;
    private $id_venda;
    private $data;
    private $vendedor;
    private $produto;
    private $total;
    private $quantidade;
    private $status;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId_venda()
    {
        return $this->id_venda;
    }

   
    public function setId_venda($id_venda)
    {
        $this->id_venda = $id_venda;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    
    public function getVendedor()
    {
        return $this->vendedor;
    }

    public function setVendedor($vendedor)
    {
        $this->vendedor = $vendedor;

        return $this;
    }

    public function getProduto()
    {
        return $this->produto;
    }

    public function setProduto($produto)
    {
        $this->produto = $produto;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;

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
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
interface VendaDAO {
    public function add(Vendas $v);
    public function edit(Vendas $v);
    public function remove($id);
    public function get($id);
    public function getAll();
}