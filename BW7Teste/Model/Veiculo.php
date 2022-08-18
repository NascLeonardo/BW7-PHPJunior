<?php

    class Veiculo{
        private $Nome;
        private $Marca;
        private $Placa; 
        private $Disponivel;
        private $id;
        private $idUsuario;

        function __construct(){
                return $this;
        }

        function constructCompleto($nome,$marca,$placa,$disponivel,$id,$idUsuario) {
                $this->Nome = $nome;
                $this->Marca = $marca;
                $this->Placa = $placa;
                $this->Disponivel = $disponivel;
                $this->id = $id;
                $this->idUsuario = $idUsuario;
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
         * Get the value of Marca
         */ 
        public function getMarca()
        {
                return $this->Marca;
        }

        /**
         * Set the value of Marca
         *
         * @return  self
         */ 
        public function setMarca($Marca)
        {
                $this->Marca = $Marca;

                return $this;
        }

        /**
         * Get the value of Placa
         */ 
        public function getPlaca()
        {
                return $this->Placa;
        }

        /**
         * Set the value of Placa
         *
         * @return  self
         */ 
        public function setPlaca($Placa)
        {
                $this->Placa = $Placa;

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

        /**
         * Get the value of idUsuario
         */ 
        public function getIdUsuario()
        {
                return $this->idUsuario;
        }

        /**
         * Set the value of idUsuario
         *
         * @return  self
         */ 
        public function setIdUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;

                return $this;
        }

        /**
         * Get the value of Disponivel
         */ 
        public function getDisponivel()
        {
                return $this->Disponivel;
        }

        /**
         * Set the value of Disponivel
         *
         * @return  self
         */ 
        public function setDisponivel($Disponivel)
        {
                $this->Disponivel = $Disponivel;

                return $this;
        }
    }
