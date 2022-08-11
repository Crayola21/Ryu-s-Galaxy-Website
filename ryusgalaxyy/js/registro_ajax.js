$(document).ready(function (){

    $("#ComprobarUser").hide();

// Función para enviar los datos al controlador AJAX
$("[name=registro_usuario]").on("click", registro_usuario);
function registro_usuario(e){
    e.preventDefault();
    var nombre_usuario        = $("#nombre_usuario").val();
    var correo_electronico    = $("#email_usuario").val();
    var password              = $("#contrasena_registro").val();
    var confirm_password      = $("#contrasena_registro_confirm").val();

    $.ajax({
        beforeSend: function() {
         
        },
        cache: false,
        type: "POST",
        dataType: "json",
        url: _rutaAJAX + "registro_controller",
        data: "&nombre_usuario="     + nombre_usuario     +
              "&correo_electronico=" + correo_electronico +
              "&password="           + password           +  
              "&passwordconfirm="    + confirm_password   +  
              "&accion=registro_usuario",
        success: function(response) {
             if(response.respuesta == true){
                Swal.fire({
                    icon: 'success',
                    text: response.mensaje ,
                });
             }else{
                Swal.fire({
                    icon: 'error',
                    text: response.mensaje ,
                });
             }
        },
        error: function(){
           
        }
    });
}

$("nombre_usuario").on("change", validar_usuario);
function validar_usuario(){
    var form  =  $(".login_ryus_registro");
    var  nombre_usuario = $("nombre_usuario").val();
    $.ajax({
        beforeSend: function() {
        
        },
        cache: false,
        type: "POST",
        dataType: "json",
        url: _rutaAJAX + "registro_controller",
        data: "&nombre_usuario="     + nombre_usuario     +
            "&accion=validar_usuario",
        success: function(response) {

            $("nombre_usuario").focus();
            if(response.respuesta == true){
                $("#ComprobarUser").show();
                form.trigger('reset');
                return;
               
            }else{
                $("#ComprobarUser").hide();
                return;
            }
        },
        error: function(){
        
        }
    });
}
});