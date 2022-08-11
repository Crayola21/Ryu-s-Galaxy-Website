<?php
include_once Clase . 'producto_model.php';
include_once Clase . 'core_functions.php';

$respuestaOK    = false;
    $mensajeError   = "No se puede ejecutar la aplicación";
    $contenidoOK    = "";

    if (isset($_POST['accion'])) {
        $opc = $_inp->post('accion');
        switch ($opc) {
            case 'registro_producto':

                    $registro  = new producto();
                    
                    $registro->NombreProducto      = $_POST['NombreProducto'];
                    $registro->Precio        = $_POST['Precio'];
                    $registro->Cantidad    = $_POST['Cantidad'];
                    $registro->FechaVencimiento    = $_POST['FechaVencimiento'];
                    $registro->Descripcion     = $_POST['Descripcion'];
                    $registro->RutaFotoProducto     = $_POST['RutaFotoProducto'];
                    $registro->FK_IdCategoria     = $_POST['FK_IdCategoria'];
                    $registro->FK_IdEstadoProducto     = $_POST['FK_IdEstadoProducto'];

                    $response = $registro->agregar_producto();
                    $respuestaOK    = true;
                    $mensajeError   = "¡Producto creado correctamente!";
                    $contenidoOK    = $response;
                
            break;

            case 'listar_producto':
                $listar =  new  producto();
                $response = $listar->listar_productos();
                $respuestaOK    = false;
                $mensajeError   = "No se puede ejecutar la aplicación";
                $contenidoOK    = $response;
            break;

           case 'form_producto':

                $form =  new  producto();

                $form->idProducto = $_POST['idProducto'];
                
                $response = $form->u_producto();
                $respuestaOK    = false;
                $mensajeError   = "No se puede ejecutar la aplicación";
                $contenidoOK    = $response;
            break;

            case 'actualizar_producto':

                $actualizar  = new producto();
                
                $actualizar->NombreProducto      = $_POST['nombre'];
                $actualizar->Descripcion         = $_POST['descripcion'];
                $actualizar->Precio              = $_POST['precio'];
                $actualizar->Cantidad            = $_POST['cantidad'];
                $actualizar->FechaVencimiento     = $_POST['fecha'];
                $actualizar->RutaFotoProducto    = $_POST['ruta'];
                $actualizar->FK_IdCategoria       = $_POST['idcategoria'];
                $actualizar->FK_IdEstadoProducto  = $_POST['idestado'];
                $actualizar->IdProducto          = $_POST['idproducto'];

                $response = $actualizar->modificar_producto(  );
                $respuestaOK    = true;
                $mensajeError   = "¡Producto actualizado correctamente!";
                $contenidoOK    = $response;
                
        break;
            case 'borrar_producto':

                $actualizar  = new producto();
                $actualizar->FK_IdEstadoProducto  = $_POST['idestado'];
                $actualizar->IdProducto           = $_POST['idproducto'];
        }
    }

    $salidaJson = array(    
        "respuesta" => $respuestaOK,
        "mensaje"   => $mensajeError,
        "contenido" => $contenidoOK,
    );
    $this->Json($salidaJson);

?>
