$(document).ready(function (){
    
    lista_estadosProducto();

    function lista_estadosProducto(){
        $.ajax({
            beforeSend: function() {
             
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "estadoProducto_controller",
            data:"&accion=listar_estadosProducto",
    
            success: function(response) {
              $("#estadosProducto").html(response.contenido)
            },
            error: function(){
               
            }
        });
    }       
    
    // Función para enviar los datos al controlador AJAX
    $("[name=registro_estadoProducto]").on("click", registro_estadoProducto);
    function registro_estadoProducto(e){
        e.preventDefault();
    
        var NombreEstadoProducto     = $("[name=NombreEstadoProducto]").val();
        var DescripcionEstadoProducto  = $("[name=DescripcionEstadoProducto]").val();

    
        $.ajax({
            beforeSend: function() {
             
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "estadoProducto_controller",
            data: "&NombreEstadoProducto="     + NombreEstadoProducto     +
                  "&DescripcionEstadoProducto=" + DescripcionEstadoProducto +
                  "&accion=registro_estadoProducto",
    
            success: function(response) {
                 if(response.respuesta == true){
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