$(document).ready(function(){
    mis_pedidos();
    function mis_pedidos(){
        $.ajax({
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "pedidoscliente_controller",
            data:"&accion=listar_pedidos_cliente",
            success: function(response) {
                $("#tableMispedidos").html(response.contenido);
            },
            error: function(){
    
            }
        });
    }

    pedidos_por_cliente();
    function pedidos_por_cliente(){
        $.ajax({
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "pedidoscliente_controller",
            data:"&accion=pedidos_por_cliente",
            success: function(response) {
                $("#listaPedidos").html(response.contenido);
                $(document).ready(function() {
                    $('#example').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                        "language": { 
                            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json" 
                        }, 
                        dom: "lBfrtip", 
                        dom: 'Bfrtip',
                        buttons: [
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5'
                        ],
                        iDisplayLength: 100 
                    });
                });
            },
            error: function(){
    
            }
        });
    }

    
    $(document).on("click", "[name=verdetalle1]", function(e){
        e.preventDefault();
        let data_id = $(this).attr("data-id");
        $("#kr-modal-detalle").modal("show");
        $.ajax({
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "pedidoscliente_controller",
            data:"&id=" + data_id+  "&accion=pedidos_por_cliente_detallado",
            success: function(response) {
                $("#detallepedido").html(response.contenido);
                $(document).ready(function() {
                    $('#example1').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                        "language": { 
                            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json" 
                        }, 
                        dom: "lBfrtip", 
                        dom: 'Bfrtip',
                        buttons: [
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5'
                        ],
                        iDisplayLength: 100 
                    });
                });
            },
            error: function(){
    
            }
        });
    });


    $(document).on("click", "[name=PendienteEntrega]", function (e){
        e.preventDefault();
        let data_id = $(this).attr("data-id");
        let opcion = "Pentrega";
        $.ajax({
            
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "pedidoscliente_controller",
            data:"&id=" + data_id + "&opcion=" + opcion + "&accion=cambiarestado",
            success: function(response) {
                if(response.contenido == true){
                    pedidos_por_cliente();
                    swal.fire({
                        icon: 'success',
                        text: "Se cambio el estado con exito" ,
                    });

                }else{
                    swal.fire({
                        icon: 'error',
                        text: "Se cambio el estado con exito" ,
                    });
                }
            },
            error: function(){
    
            }
        });
    });

    $(document).on("click", "[name=Entregado]", function (e){
        e.preventDefault();
        let data_id = $(this).attr("data-id");
        let opcion = "entregado";
        $.ajax({
            
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "pedidoscliente_controller",
            data:"&id=" + data_id + "&opcion=" + opcion + "&accion=cambiarestado",
            success: function(response) {
                pedidos_por_cliente();
                if(response.contenido == true){
                    swal.fire({
                        icon: 'success',
                        text: "Se cambio el estado con exito" ,
                    });

                }else{
                    swal.fire({
                        icon: 'error',
                        text: "Se cambio el estado con exito" ,
                    });
                }
            },
            error: function(){
    
            }
        });
    });


    $(document).on("click", "[name=Cancelado]", function (e){
        e.preventDefault();
        let data_id = $(this).attr("data-id");
        let opcion = "cancelado";
        $.ajax({
            
            beforeSend: function() {
            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: _rutaAJAX + "pedidoscliente_controller",
            data:"&id=" + data_id + "&opcion=" + opcion + "&accion=cambiarestado",
            success: function(response) {
                pedidos_por_cliente();
                if(response.contenido == true){
                    swal.fire({
                        icon: 'success',
                        text: "Se cambio el estado con exito" ,
                    });

                }else{
                    swal.fire({
                        icon: 'error',
                        text: "Se cambio el estado con exito" ,
                    });
                }
            },
            error: function(){
    
            }
        });
    });
});