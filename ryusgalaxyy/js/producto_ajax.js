$(document).ready(function (){
    listar_productos();
    mostrar_boton();

    function listar_productos(){
        $.ajax({
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "producto_controller",
            data:"&accion=listar_producto",
    
            success: function(response) {
                $("#tabla_productos").html(response.contenido)
            },
            error: function(){

            }
        });
    }     

// Función para enviar los datos al controlador AJAX
$('[name=guardar_producto]').on("click", registro_producto);

function registro_producto(e){
e.preventDefault();
    var NombreProducto      = $("[name=NombreProducto]").val();
    var Precio              = $("[name=Precio]").val();
    var Cantidad            = $("[name=Cantidad]").val();  
    var FechaVencimiento    = $("[name=FechaVencimiento]").val();
    var Descripcion         = $("[name=Descripcion]").val();
    var RutaFotoProducto    = $("[name=RutaFotoProducto]").val();
    var FK_IdCategoria      = $("[name=FK_IdCategoria] :selected").val();
    var FK_IdEstadoProducto = $("[name=FK_IdEstadoProducto ] :selected").val();

    $.ajax({
        beforeSend: function() {
         
        },
        cache: false,
        type: "POST",
        dataType: "json",
        url: _rutaAJAX + "producto_controller",
        data: "&NombreProducto="     + NombreProducto     +
              "&Precio=" + Precio +
              "&Cantidad=" + Cantidad +  
              "&FechaVencimiento=" + FechaVencimiento +
              "&Descripcion=" + Descripcion +
              "&RutaFotoProducto=" + RutaFotoProducto +
              "&FK_IdCategoria=" + FK_IdCategoria +
              "&FK_IdEstadoProducto=" + FK_IdEstadoProducto +
              "&accion=registro_producto",

        success: function(response) {
             if(response.respuesta == true){
                 
                swal.fire({
                    icon: 'success',
                    text: response.mensaje ,
                });
                listar_productos();
                resetearform_producto();
             }else{
                swal.fire({
                    icon: 'error',
                    text: response.mensaje ,
                });
             }
        },
        error: function(){
        }
    });
    }

$("[name=actualizar_producto]").on("click", modificar_producto);

function modificar_producto(e){
e.preventDefault();

    var idproducto      = $("[name=IdProducto]").val();
    var nombre          = $("[name=NombreProducto]").val();
    var precio          = $("[name=Precio]").val();
    var cantidad        = $("[name=Cantidad]").val();  
    var fecha           = $("[name=FechaVencimiento]").val();
    var descripcion     = $("[name=Descripcion]").val();
    var ruta            = $("[name=RutaFotoProducto]").val();
    var idcategoria     = $("[name=FK_IdCategoria] :selected").val();
    var idestado        = $("[name=FK_IdEstadoProducto ] :selected").val();

    $.ajax({
        beforeSend: function() {
         
        },
        cache: false,
        type: "POST",
        dataType: "json",
        url: _rutaAJAX + "producto_controller",
        data: 
            "&idproducto="     + idproducto     +
            "&nombre="        + nombre     +
            "&precio=" + precio +
            "&cantidad=" + cantidad +  
            "&fecha=" + fecha +
            "&descripcion=" + descripcion +
            "&ruta=" + ruta +
            "&idcategoria=" + idcategoria +
            "&idestado=" + idestado +
            "&accion=actualizar_producto",

        success: function(response) {
            if(response.respuesta == true){
                swal.fire({
                    icon: 'success',
                    text: response.mensaje ,
                });
                listar_productos();
                resetearform_producto();
            }
            else{
                swal.fire({
                    icon: 'error',
                    text: response.mensaje ,
                });
             }
        },
        error: function(){
           
        }
    });
    }

$('[name=IdProducto]').triggerHandler('change', mostrar_boton);

function mostrar_boton(){
    
    if($('[name=IdProducto]').val() == ''){    
    $("[name=guardar_producto]").attr('hidden', false);
    $("[name=actualizar_producto]").attr('hidden', true);
    }

    if($("[name=IdProducto]").val() != ''){
    $("[name=actualizar_producto]").attr('hidden', false);
    $("[name=guardar_producto]").attr('hidden', true);
}
}

$(document).on('click', "[name=btnEditar]", llenarform_producto);

function llenarform_producto(){
    let idProducto=$(this).attr('data_id');
    $.ajax({
        beforeSend: function() {

        },
        cache: false,
        type: "POST",
        dataType: "json",
        url: _rutaAJAX + "producto_controller",
        data:"&idProducto="+ idProducto +
        "&accion=form_producto",
        success: function(response) {
            $("[name=IdProducto]").val(response.contenido.idproducto);
            $("[name=NombreProducto]").val(response.contenido.nombre);
            $("[name=Precio]").val(response.contenido.precio);
            $("[name=Cantidad]").val(response.contenido.cantidad);  
            $("[name=FechaVencimiento]").val(response.contenido.fechav);
            $("[name=Descripcion]").val(response.contenido.descripcion);
            $("[name=RutaFotoProducto]").val(response.contenido.ruta);
            $("[name=FK_IdCategoria]").val(response.contenido.idcategoria);
            $("[name=FK_IdEstadoProducto]").val(response.contenido.idestado);
            mostrar_boton();
        },
        error: function(){
           
        }
        
    });

    //Función para llamar formulario modal
    // let id = $(this).attr('data_id');
    // $("#modalFormEditar").modal('show');
}

$(document).on('click', "[name=resetear]", resetearbtn_producto);

function resetearbtn_producto(e){
    e.preventDefault();
    $("[name=IdProducto]").val('');
    document.getElementById('form_producto').reset();
    mostrar_boton();
}

function resetearform_producto(){
    $("[name=IdProducto]").val('');
    document.getElementById('form_producto').reset();
    mostrar_boton();
}

}
);
