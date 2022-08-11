<?php
defined('_access') or exit;

class AjaxRoute{

    public function LoadFile($File){
        $_inp = new Input();
        $_val = new Validar();
        $ficheros1 = scandir(DirectorioAjax);
        if (in_array($File . ".php", $ficheros1)) {
            include(DirectorioAjax. $File . ".php");
        }
        else
        {
            $this->Error('Error');
        }
    }

    public function Json($salida){
        header("Content-type:application/json");
        echo json_encode($salida);
    }

    public function Error($mensaje)
    {
        header("Content-type:application/json");
        $salidaJson = array ("respuesta" => false, "mensaje" => $mensaje, "contenido" => "");
        echo json_encode($salidaJson, JSON_HEX_AMP | JSON_HEX_QUOT | JSON_HEX_APOS | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}

