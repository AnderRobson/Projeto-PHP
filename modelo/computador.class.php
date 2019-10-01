<?php
    class Computador
    {
        private $id;
        private $nome;
        private $placaMae;
        private $processador;
        private $memoria;
        private $hd;
        private $fonte;
        private $gabinete;
        private $valor;

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
                          Placa Mãe: $this->placaMae
                          Processador: $this->processador
                          Memoria: $this->memoria
                          HD: $this->hd
                          Fonte: $this->fonte
                          Gabinete: $this->gabinete
                          Valor: $this->valor");
        }

    }