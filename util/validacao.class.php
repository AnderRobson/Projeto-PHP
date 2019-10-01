<?php
    class Validacao
    {
        public static function validarTexto($valor): bool
        {
            $expressao = "/^[a-zA-ZàÀèÈìÌòÒùÙáÁéÉíÍóÓúÚýÝâÂêÊîÎôÔûÛãÃñÑõÕäÄëËïÏçöÖüÜÿŸ ]{2,70}$/";
            return preg_match($expressao, $valor);
        } 

        public static function validarCPF($valor): bool
        {
            $expressao = "/^[0-9]{3}[0-9]{3}[0-9]{3}[0-9]{2}$/";
            return preg_match($expressao, $valor);
        }

        public static function validarSexo($valor): bool
        {
            if($valor == 'Masculino' || $valor == 'Feminino'){
                return true;
            }
            return false;
        }

        public static function validarTextNumero($valor): bool
        {
            $expressao = "/^[a-zA-Z0-9àÀèÈìÌòÒùÙáÁéÉíÍóÓúÚýÝâÂêÊîÎôÔûÛãÃñÑõÕäÄëËïÏçöÖüÜÿŸ,.\-_ ]{2,70}$/";
            return preg_match($expressao, $valor);
        } 

        /*public static function validarDataNascimento($valor): bool
        {
            $data = explode('-', $valor);

            $ano = $data[0];
            $mes = $data[1];
            $dia = $data[2];

            if(checkdate($mes, $dia, $ano)) {
                return true;
            }
            return false;
        }*/

        
        public static function validarNumero($valor): bool
        {
            $expressao = "/^[0-9]{0,11}$/";
            return preg_match($expressao, $valor);
        }

        public static function validarGabinete($valor): bool
        {
            if($valor == 'NOX PAX ATX, Iluminação de LED Vermelho' || $valor == 'Gamer Warrior com Lateral em Acrílico' || $valor == 'Gaerocool Cylon RGB LED MID Tower ATX') {
                return true;
            }
            return false;
        }

        public static function validarValor($valor): bool
        {
            $expressao = "/^\d*[0-9](\.\d*[0-9])?$/";
            return preg_match($expressao, $valor);
        }
    }