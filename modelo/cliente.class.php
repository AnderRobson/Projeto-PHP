<?php
    class Cliente
    {
        private $id;
        private $nome;
        private $sexo;
        private $cpf;
        private $endereco;
        private $dataNascimento;
        private $celular;
        private $telefone;
        
        public function __construct()
        {

        }

        public function __destruct()
        {

        }

        public function __GET($atributo)
        {
            return $this->$atributo;
        }

        public function __SET($atributo, $valor)
        {
            $this->$atributo = $valor;
        } 

        public function __toString()
        {
            return nl2br("Código: $this->id
                          Nome: $this->nome
                          Sexo: $this->sexo
                          CPF: $this->cpf
                          Endereço: $this->endereco
                          Data de nascimento: $this->dataNascimento
                          Celular: $this->celular
                          Telefone: $this->telefone");
        }
    }