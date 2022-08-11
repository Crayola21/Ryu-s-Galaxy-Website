<?php
    include_once Clase . 'registro_model.php';
    include_once Clase . 'core_functions.php';

    

    $respuestaOK    = false;
    $mensajeError   = "No se puede ejecutar la aplicación";
    $contenidoOK    = "";

    if (isset($_POST['accion'])) {
        $opc = $_inp->post('accion');
        switch ($opc) {
            case 'registro_usuario':
                $registro       = new registro_usuarios();
                $pass1          = $_POST['password'];
                $pass2          = $_POST['passwordconfirm'];
                
                if( $pass1  == $pass2   ){
                    $registro->NombreUsuario        = $_POST['nombre_usuario'];
                    $registro->EmailUsuario         = $_POST['correo_electronico'];
                    $registro->ContrasenaUsuario    = $_POST['password'];
                    $registro->FK_IdRolUsuario      = 1;

                    $response = $registro->add_user();
                    $respuestaOK    = true;
                    $mensajeError   = "¡Usuario Registrado Con Exito!";
                    $contenidoOK    = $response;
                }else{
                    $respuestaOK    = false;
                    $mensajeError   = "¡Las Contraseñas No Coinciden!";
                    $contenidoOK    = "";
                }

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
