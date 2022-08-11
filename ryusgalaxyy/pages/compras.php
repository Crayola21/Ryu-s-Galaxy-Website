<div class="content">
    <div class="container-fluid  ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Compras de productos</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Fecha compra</label>
                                        <input type="date" class="form-control" name="FechaCompra"
                                            placeholder="Fecha compra">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Proveedor</label>
                                        <select class="form-control" name="FK_IdProveedor">
                                            <option selected disabled>Seleccione proveedor</option>
                                        </select>
                                    </div>
                                   
                                </div>
                                <div class="col-md-1 my-auto">
                                <button class="btn btn-info btn-fill ">Nuevo proveedor</button>
                                </div>
                            </div>
                                <div class="form-group agregarproductos">
                                    <div class="row">
                                        <div class="col-md-3 pr-1">
                                            <div class="form-group">
                                                <label>Producto</label>
                                                <input type="text" class="form-control" name="Cantidad"
                                                    placeholder="Cantidad del producto">
                                            </div>
                                        </div>
                                        <div class="col-md-2 pl-1">
                                            <div class="form-group">
                                                <label for="Apellidoslbl">Costo producto</label>
                                                <input type="text" class="form-control" name="" placeholder="Precio">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Cantidad producto</label>
                                                <input type="text" class="form-control" name="Cantidad"
                                                    placeholder="Cantidad del producto">
                                            </div>
                                        </div>
                                        <div class="col-md-2 pr-5" style="align-items: center">
                                        <button class="btn btn-info btn-fill"> + </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right"
                                    style="height: 50px">Guardar Producto</button>


                                <!-- Tabla sin fondo -->
                                <div class="col-md-12">
                                    <div class="card card-plain table-plain-bg">
                                        <div class="card-header ">
                                            <h4 class="card-title">Compra</h4>
                                        </div>
                                        <div class="card-body table-full-width table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>Costo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>