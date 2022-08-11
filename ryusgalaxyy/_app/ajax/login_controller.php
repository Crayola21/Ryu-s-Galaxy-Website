<?php
    include_once Clase . 'login_model.php';
    include_once Clase . 'catalogo.php';
    include_once Clase . 'Csrf.php';
    include_once Clase . 'core_functions.php';
    $login  = new login();
    $catalogo =  new Catalogo();
    $Csrf     = new Csrf();
    

    $respuestaOK    = false;
    $mensajeError   = "No se puede ejecutar la aplicación";
    $contenidoOK    = "";

    if (isset($_POST['accion'])) {
        $opc = $_inp->post('accion');
        switch ($opc) {
            case 'iniciar_sesion':
                $login->NombreUsuario       = $_POST['nombre_usuario'];
                $login->EmailUsuario        = $_POST['nombre_usuario'];
                $login->ContrasenaUsuario   = $_POST['password'];
                $login->token               = $_SESSION['csrf_token']['token'];
                $response = $login->login_usuario();
                if( !$response ){
                    $respuestaOK    = false;
                    $mensajeError   = "¡Los datos de acceso no son correctos, intente nuevamene!";
                    $contenidoOK    = "";
                }else{
                    $respuestaOK    = true;
                    $mensajeError   = "";
                    $contenidoOK    = $response;
                }

            break;
            case 'actualizarID':
                if(isset($_SESSION[ID_USUARIO])){
                    $id_user = $_SESSION[ID_USUARIO] ;
                }else{
                    $id_user = NULL;
                }
                $respuesta =  $catalogo->actualizar_id($_POST['tokken'], $id_user );
                $contenidoOK = $id_user;
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
