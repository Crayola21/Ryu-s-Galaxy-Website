<?php
include_once Clase . 'estadoProducto_model.php';
include_once Clase . 'core_functions.php';

   $respuestaOK    = false;
    $mensajeError   = "No se puede ejecutar la aplicación";
    $contenidoOK    = "";

    if (isset($_POST['accion'])) {
        $opc = $_inp->post('accion');
        switch ($opc) {
            case 'registro_estadoProducto':

                    $registro       = new estadoProducto();
                    
                    $registro->NombreEstadoProducto      = $_POST['NombreEstadoProducto'];
                    $registro->DescripcionEstadoProducto        = $_POST['DescripcionEstadoProducto'];

                    $response = $registro->agregar_estadoProducto();
                    $respuestaOK    = true;
                    $mensajeError   = "¡Estado Producto creado correctamente!";
                    $contenidoOK    = $response;
                
            break;

            case 'listar_estadosProducto':
                 $listar =  new  estadoProducto();
                 $response = $listar->listar_estadosProducto();
                $respuestaOK    = false;
                $mensajeError   = "No se puede ejecutar la aplicación";
                $contenidoOK    = $response;
            break;
            
        }
    }

    $salidaJson = array(    
        "respuesta" => $respuestaOK,
        "mensaje"   => $mensajeError,
        "contenido" => $contenidoOK,
    );
    $this->Json($salidaJson);

?>
