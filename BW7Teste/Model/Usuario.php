<?php

class Usuario{
    private $Nome;
    private $Email;
    private $Senha;
    private $id;

    function __construct() {
        return $this;
    }

    function constructParcial($nome, $email, $senha) {
        $this->Nome = $nome;
        $this->Email = $email;
        $this->Senha = $senha;
    }

    /**
     * Get the value of Nome
     */ 
    public function getNome()
    {
        return $this->Nome;
    }

    /**
     * Set the value of Nome
     *
     * @return  self
     */ 
    public function setNome($Nome)
    {
        $this->Nome = $Nome;

        return $this;
    }

    /**
     * Get the value of Email
     */ 
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     *
     * @return  self
     */ 
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get the value of Senha
     */ 
    public function getSenha()
    {
        return $this->Senha;
    }

    /**
     * Set the value of Senha
     *
     * @return  self
     */ 
    public function setSenha($Senha)
    {
        $this->Senha = $Senha;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}

?>