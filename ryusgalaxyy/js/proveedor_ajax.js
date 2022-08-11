$(document).ready(function (){
    
listar_proveedores();
function listar_proveedores(){
    $.ajax({
        beforeSend: function() {
         
        },
        cache: false,
        type: "POST",
        dataType: "json",
        url: _rutaAJAX + "proveedor_controller",
        data:"&accion=listar_proveedor",

        success: function(response) {
          $("#tabla_proveedores").html(response.contenido)
        },
        error: function(){
           
        }
    });
}       

// Función para enviar los datos al controlador AJAX
$("[name=registro_proveedor]").on("click", registro_proveedor);
function registro_proveedor(e){
    e.preventDefault();

    var Identificacion     = $("[name=Identificacion]").val();
    var NombresProveedor   = $("[name=NombresProveedor]").val();
    var ApellidosProveedor = $("[name=ApellidosProveedor]").val();
    var PaisProveedor      = $("[name=PaisProveedor]").val();
    var CiudadProveedor    = $("[name=CiudadProveedor]").val();
    var EmailProveedor     = $("[name=EmailProveedor]").val();
    var TelefonoProveedor  = $("[name=TelefonoProveedor]").val();
    var CelularProveedor   = $("[name=CelularProveedor]").val();

    $.ajax({
        beforeSend: function() {
         
        },
        cache: false,
        type: "POST",
        dataType: "json",
        url: _rutaAJAX + "proveedor_controller",
        data: "&Identificacion="     + Identificacion     +
              "&NombresProveedor=" + NombresProveedor +
              "&ApellidosProveedor=" + ApellidosProveedor +  
              "&PaisProveedor=" + PaisProveedor +
              "&CiudadProveedor=" + CiudadProveedor +
              "&EmailProveedor=" + EmailProveedor +
              "&TelefonoProveedor=" + TelefonoProveedor +
              "&CelularProveedor=" + CelularProveedor +
              "&accion=registro_proveedor",

        success: function(response) {
             if(response.respuesta == true){
                listar_proveedores();
                document.getElementById("registro_proveedor").reset(); 
                swal.fire({
                    icon: 'success',
                    text: response.mensaje ,
                });
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
}});