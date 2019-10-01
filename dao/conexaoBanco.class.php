<?php
    class ConexaoBanco extends PDO
    {
        private static $_instance = null;

        public function __construct($_databaseName, $_user, $_password)
        {
            parent::__construct($_databaseName, $_user, $_password);
        }

        public static function getInstance()
        {
            try {
                if (!isset(self::$_instance)) {
                    self::$_instance = new ConexaoBanco ("mysql:dbname=projetoander;host=localhost", "root", "");
                }
                return self::$_instance;
            } catch(PDOException $_error) {
                echo "Erro ao conectar! " . $_error;
            }
        }
    }