<?php
include_once Clase . 'proveedor_model.php';
include_once Clase . 'core_functions.php';

   $respuestaOK    = false;
    $mensajeError   = "No se puede ejecutar la aplicación";
    $contenidoOK    = "";

    if (isset($_POST['accion'])) {
        $opc = $_inp->post('accion');
        switch ($opc) {
            case 'registro_proveedor':

                    $registro       = new proveedor();
                    
                    $registro->Identificacion      = $_POST['Identificacion'];
                    $registro->NombresProveedor        = $_POST['NombresProveedor'];
                    $registro->ApellidosProveedor    = $_POST['ApellidosProveedor'];
                    $registro->PaisProveedor     = $_POST['PaisProveedor'];
                    $registro->CiudadProveedor     = $_POST['CiudadProveedor'];
                    $registro->EmailProveedor     = $_POST['EmailProveedor'];
                    $registro->TelefonoProveedor     = $_POST['TelefonoProveedor'];
                    $registro->CelularProveedor     = $_POST['CelularProveedor'];

                    $response = $registro->agregar_proveedor();
                    $respuestaOK    = true;
                    $mensajeError   = "¡Proveedor creado correctamente!";
                    $contenidoOK    = $response;
                
            break;

            case 'listar_proveedor':
                 $listar =  new  proveedor();
                 $response = $listar->listar_proveedores();
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
