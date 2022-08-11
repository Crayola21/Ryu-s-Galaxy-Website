<?php
include_once Clase . 'categoria_model.php';
include_once Clase . 'core_functions.php';

   $respuestaOK    = false;
    $mensajeError   = "No se puede ejecutar la aplicación";
    $contenidoOK    = "";

    if (isset($_POST['accion'])) {
        $opc = $_inp->post('accion');
        switch ($opc) {
            case 'registro_categoria':

                    $registro       = new categoria();
                    
                    $registro->NombreCategoria      = $_POST['NombreCategoria'];
                    $registro->DescripcionCategoria        = $_POST['DescripcionCategoria'];

                    $response = $registro->agregar_categoria();
                    $respuestaOK    = true;
                    $mensajeError   = "¡Categoría creado correctamente!";
                    $contenidoOK    = $response;
                
            break;

            case 'listar_categorias':
                $listar =  new  categoria();
                $response = $listar->listar_categorias();
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
