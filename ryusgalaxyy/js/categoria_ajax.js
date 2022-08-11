$(document).ready(function (){
    
    lista_categorias();

    function lista_categorias(){
        $.ajax({
            beforeSend: function() {
             
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "categoria_controller",
            data:"&accion=listar_categorias",
    
            success: function(response) {
              $("#categorias").html(response.contenido);
            },
            error: function(){
               
            }
        });
    }       
    
    // Función para enviar los datos al controlador AJAX
    $("[name=registro_categoria]").on("click", registro_categoria);
    function registro_categoria(e){
        e.preventDefault();
    
        var NombreCategoria     = $("[name=NombreCategoria]").val();
        var DescripcionCategoria   = $("[name=DescripcionCategoria]").val();

    
        $.ajax({
            beforeSend: function() {
             
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "categoria_controller",
            data: "&NombreCategoria="     + NombreCategoria     +
                  "&DescripcionCategoria=" + DescripcionCategoria +
                  "&accion=registro_categoria",
    
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