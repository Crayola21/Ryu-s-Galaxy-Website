$(document).ready(function(event){
    $("[name=login]").on("click", function(){
        var nombre_usuario    = $("#correo_user_login").val();
        var password          = $("#contrasena_login").val();

        $.ajax({
            beforeSend: function() {
            
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "login_controller",
            data: "&nombre_usuario="    + nombre_usuario     +
                "&password="           + password           +  
                "&accion=iniciar_sesion",
            success: function(response) {
                if(response.respuesta === true){
                    if(response.contenido.rol  == 1    || response.contenido.rol == "1"){
                        $('#modalLogin').modal('toggle');
                        actualizar_id();
                        recargar(1000);
                    }else{
                        actualizar_id();
                        location.reload();
                    }
                }else{
                    Swal.fire({
                        icon: 'error',
                        text: response.mensaje ,
                    });
                    return;
                }
            },
            error: function(){
            
            }
        });
    });
    actualizar_id();
    function actualizar_id(){
        let tokken = $("[name=tokken_user]").val();      
        $.ajax({
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "login_controller",
            data:"&tokken=" + tokken  + "&accion=actualizarID",
            success: function(response) {
            },
            error: function(){
    
            }
        });
    }

    function recargar(time = 0) {
		setTimeout(() => {
            window.location.reload();
		}, time);
    }
});