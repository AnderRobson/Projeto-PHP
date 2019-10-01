<?php
    class Padronizacao
    {
        public static function padronizarTexto($valor): string
        {
            return ucwords(strtolower($valor));
        }

        public static function padronizarData($valor): string
        {
            $data = explode('-', $valor);

            $dia = $data['2'];
            $mes = $data['1'];
            $ano = $data['0'];

            return $dia . '/' . $mes . '/' . $ano;
        } 

        public static function padronizarCPF($valor)
        {

        }
    }
