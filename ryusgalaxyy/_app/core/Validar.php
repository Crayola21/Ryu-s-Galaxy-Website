<?php

defined('_access') or exit;
class Validar{

    public function Post($excep)
    {
        foreach ($_POST as $clave => $valor) {
            if (is_array($valor)) {
                foreach ($valor as $clave1 => $valor1) {
                    if (isset($excep[$clave])) {
                        if (in_array( $clave1, $excep[$clave])) {
                            continue;
                        }
                    }
                    $valor1 = trim($valor1);
                    if (empty($valor1) && !is_numeric($valor1)) {
                        unset($valor1); 
                        return false;
                    }
                }
            }
            else {
                $valor = trim($valor);
                if (in_array( $clave, $excep)) {
                    continue;
                } else if (empty($valor) && !is_numeric($valor)) {
                    unset($valor); 
                    return false;
                }
            }
        }
        return true;
    }
}