<style>
select.form-control:not([size]):not([multiple]) {
    height: calc(3.25rem + 2px) !important;
}
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>Pedidos Clientes</h1>
            
        </div>
        <div class = "container-fluid">
            <div id="listaPedidos"></div>
        </div>
    </div>
</div>


        <!-- Modal para DETALLE-->
        <div class="modal " id="kr-modal-detalle" tabindex="-1">
            <div class="modal-dialog " role="document">
                <div class="modal-content modal-lg">
                    <div class="modal-header text-center">
                        <h1 class="modal-title " id="exampleModalLongTitle">Detalle Pedido</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="detallepedido"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin del modal para el inicio de sesión -->
