$(document).ready(function(){

    // Crea un nuevo tokken cuando carga la página
    actualizar_tokken();

    mostrar_contadores();
    // Agrega productos al carrito.
    $("[name=carrito]").on("click", agregar_al_carrito);
    var producto;
    function agregar_al_carrito(){
        event.preventDefault();
        producto = $(this).attr("data-id");
        var tokken = $("[name=tokken_user]").val(); 
        $.ajax({
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "catalogo",
            data:"&producto=" + producto + "&tokken" + tokken + "&accion=agregar_al_carrito",    
            success: function(response) {
                mostrar_contadores();  
            },
            error: function(){ 
                alert("error realizando la consulta");
            }
        });
    }

    // Crea un nuevo tokken cuando carga la página
    function actualizar_tokken(){
        $.ajax({
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "catalogo",
            data:"&accion=actualizar_tokken",
            success: function(response) {
                $("[name=tokken_user]").val(response.contenido);
            },
            error: function(){
            }
        });
    }
    

    // Actualizar los contadores de carrito
    function mostrar_contadores(){
        var tokken = $("[name=tokken_user]").val();    
        if(tokken === "0"){
            $("#contador_productos").html(0);
            $("#totalprecio ").html("$" + "0.00");
        }else{
            $.ajax({
                beforeSend: function() {
                },
                cache: false,
                type: "POST",
                dataType: "json",
                url: _rutaAJAX + "catalogo",
                data:"&tokken=" + tokken + "&accion=mostrar_contadores",
                success: function(response) {
                    $("#contador_productos").html(response.contenido.contador);
                    $("#totalprecio").html(response.contenido.total);
                },
                error: function(){
        
                }
            });
                        
        }
    }

    // Muestra los productos agregados en la vista realizarpago
    listar_productos_carrito();
    function listar_productos_carrito(e){
        var tokken = $("[name=tokken_user]").val(); 
        $.ajax({
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "catalogo",
            data:"&tokken=" + tokken + "&accion=listar_productos_carrito",
            success: function(response) {
                $("#cargar_tablaPagar").html(response.contenido);
                mostrar_contadores();
            },
            error: function(){
            }
        });
    }

    $(document).on("click", "[name=addproducto]", function(e){
        var id_producto = $(this).attr('data-id');
        var tokken = $("[name=tokken_user]").val();      
        $.ajax({
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "catalogo",
            data:"&tokken=" + tokken + "&id_producto=" + id_producto+ "&accion=adicionar_producto",
            success: function(response) {
                listar_productos_carrito();
                mostrar_contadores();
            },
            error: function(){
    
            }
        });
    });

    $(document).on("click", "[name=removeproducto]", function(e){
        var id_producto = $(this).attr('data-id');
        var tokken = $("[name=tokken_user]").val();      
        $.ajax({
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "catalogo",
            data:"&tokken=" + tokken + "&id_producto=" + id_producto+ "&accion=remover_producto",
            success: function(response) {
                listar_productos_carrito();
                mostrar_contadores();
            },
            error: function(){
    
            }
        });
    });

    $(document).on("click", "[name=eliminar_producto]", function(e){
        var id_producto = $(this).attr('data-id');
        var tokken = $("[name=tokken_user]").val();      
        $.ajax({
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "catalogo",
            data:"&tokken=" + tokken + "&id_producto=" + id_producto+ "&accion=eliminar_producto",
            success: function(response) {
                listar_productos_carrito();
                mostrar_contadores();
                
            },
            error: function(){
    
            }
        });
    });

    $(document).on("click", "[name=realizarPedido]", realizar_pedido );
    function realizar_pedido(e){
        e.preventDefault();
        var tokken = $("[name=tokken_user]").val();      
        $.ajax({
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "catalogo",
            data:"&tokken=" + tokken  + "&accion=realizar_pedido",
            success: function(response) {
                if(response.contenido == false){
                    $("#modalLogin").modal("show");
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Pedido realizado con exito',
                        showConfirmButton: false,
                        timer: 3000
                    });
                        setTimeout(() => {
                        window.location.href= _rutaRaiz + "panelcliente";
                    }, 3000);
                }
                
            },
            error: function(){
    
            }
        });
    }
    
});
