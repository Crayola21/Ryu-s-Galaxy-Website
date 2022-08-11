<?php
include_once Clase . 'catalogo.php';
include_once Clase . 'core_functions.php';

    $respuestaOK    = false;
    $mensajeError   = "No se puede ejecutar la aplicación";
    $contenidoOK    = "";

    if (isset($_POST['accion'])) {
        $opc = $_inp->post('accion');
        switch ($opc) {
            case 'actualizar_tokken':

                $catalogo       = new Catalogo();               
                $response = $catalogo->actualizar_tokken();
                $respuestaOK    = true;
                $mensajeError   = "¡!";
                $contenidoOK    = $response;
            
            break;
            case 'agregar_al_carrito':
                    if(isset($_SESSION[ID_USUARIO])){
                        $id_user = $_SESSION[ID_USUARIO];
                    }else{
                        $id_user = NULL;
                    }
                    $catalogo       = new Catalogo();               
                    $catalogo->producto      = $_POST['producto'];
                    $catalogo->id_usuario    = $id_user;
                    $response = $catalogo->agregar_al_carrito();
                    $respuestaOK    = true;
                    $mensajeError   = "¡!";
                    $contenidoOK    = $response;
                
                break;
            case 'mostrar_contadores':
                $catalogo       = new Catalogo();    
                $catalogo->tokken_consulta      = $_POST['tokken'];
                $response = $catalogo->mostrar_contadores();
                $respuestaOK    = true;
                $mensajeError   = "¡!";
                $contenidoOK    = $response;
                break;
            case 'listar_productos_carrito':
                $catalogo       = new Catalogo();    
                $catalogo->tokken_consulta  = $_POST['tokken'];
                $response = $catalogo->listar_productos_carrito();
                $respuestaOK    = true;
                $mensajeError   = "¡!";
                $contenidoOK    = $response;
                break;
                
            case 'adicionar_producto':
                $catalogo       = new Catalogo();    
                $response = $catalogo->adicionar_producto($_POST['tokken'],  $_POST['id_producto'], 1);
                $respuestaOK    = true;
                $mensajeError   = "¡!";
                $contenidoOK    = $response;
                break;  

            case 'remover_producto':
                $catalogo       = new Catalogo();    
                
                $response = $catalogo->remover_producto($_POST['tokken'],  $_POST['id_producto'], 1);
                $respuestaOK    = true;
                $mensajeError   = "¡!";
                $contenidoOK    = $response;
                break;   
            case 'eliminar_producto':
                $catalogo       = new Catalogo();    
                
                $response = $catalogo->eliminar_producto($_POST['tokken'],  $_POST['id_producto']);
                $respuestaOK    = true;
                $mensajeError   = "¡!";
                $contenidoOK    = $response;
                break;  
            case 'realizar_pedido':
                $catalogo       = new Catalogo();    
                
                $response = $catalogo->realizar_pedido($_POST['tokken']);
                $respuestaOK    = true;
                $mensajeError   = "¡extraño!";
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
