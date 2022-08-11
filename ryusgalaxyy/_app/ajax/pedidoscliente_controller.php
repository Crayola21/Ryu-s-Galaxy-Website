<?php
    include_once Clase . 'pedidoscliente_model.php';
    include_once Clase . 'core_functions.php';
    $pedidos       = new Pedidos_cliente();   

    $respuestaOK    = false;
    $mensajeError   = "No se puede ejecutar la aplicación";
    $contenidoOK    = "";
    
    if (isset($_POST['accion'])) {
        $opc = $_inp->post('accion');
        switch ($opc) {
            case 'listar_pedidos_cliente':
                if(isset($_SESSION[ID_USUARIO])){
                    $id_user = $_SESSION[ID_USUARIO] ;
                }else{
                    $id_user = NULL;
                }
                $pedidos->id_usuario = $id_user ;
                $response = $pedidos->listar_pedidos_cliente();
                $respuestaOK    = true;
                $mensajeError   = "¡!";
                $contenidoOK    = $response;
            
            break;
            case 'pedidos_por_cliente':
        
                $response = $pedidos->pedidos_por_cliente();
                $respuestaOK    = true;
                $mensajeError   = "¡!";
                $contenidoOK    = $response;
            
            break;
            case 'pedidos_por_cliente_detallado':
                $id = $_POST['id'];
                $response = $pedidos->pedidos_por_cliente_detallado($id);
                $respuestaOK    = true;
                $mensajeError   = "¡!";
                $contenidoOK    = $response;
            
            break;
            case 'mis_pedidos':
                $response = $pedidos->mis_pedidos($_SESSION[ID_USUARIO]);
                $respuestaOK    = true;
                $mensajeError   = "¡!";
                $contenidoOK    = $response;
            
            break;
            case 'cambiarestado':
                $id_producto  = $_POST['id'];
                $opcion  = $_POST['opcion'];
                if($opcion == "Pentrega"){
                    $opc = 2;
                }else if($opcion == "entregado"){
                    $opc = 3;
                }else{
                    $opc = 4;
                }

                $response = $pedidos->cambiar_estado($id_producto, $opc);
                $respuestaOK    = true;
                $mensajeError   = "¡!";
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
