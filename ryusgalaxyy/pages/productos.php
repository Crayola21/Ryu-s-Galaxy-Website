<div class="content">
                <div class="container-fluid  ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Producto</h4>
                                </div>
                                <div class="card-body">
                                    <form name="formregistro_producto" id="form_producto" method="POST">
                                        <input type="hidden" name="IdProducto" class="form-control">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Nombre Producto</label>
                                                    <input type="text" class="form-control" name="NombreProducto" placeholder="Nombre del producto">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="Apellidoslbl">Precio del producto</label>
                                                    <input type="text" class="form-control" name="Precio" placeholder="Precio">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label>Cantidad</label>
                                                    <input type="text" class="form-control" name="Cantidad" placeholder="Cantidad del producto">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Fecha vencimiento</label>
                                                    <input type="date" class="form-control" name="FechaVencimiento" placeholder="Fecha vencimiento">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-9">
                                                <div class="form-group">
                                                    <label>Descripción</label>
                                                    <input type="text" class="form-control" name="Descripcion" placeholder="Decripción del producto">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Foto producto</label>
                                                    <input type="text" class="form-control" name="RutaFotoProducto" placeholder="Foto producto">
                                                </div>
                                            </div>
                                            <div class="col-md-3 my-auto">
                                                <button class="btn btn-info btn-fill">Subir foto</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Categoria</label>
                                                    <div>
                                                        <select class="form-control custom-select" name="FK_IdCategoria" id="categorias">

                                                        </select>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <button type="button" class="btn btn-info btn-fill" data-toggle="modal" data-target="#modal_categoria">+</button>
                                                    </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                            <div class="col-md-8">
                                            <div class="form-group">
                                                    <label>Estado Producto</label>
                                                        <div>
                                                            <select class="form-control custom-select" name="FK_IdEstadoProducto" id="estadosProducto">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                    <button type="button" class="btn btn-info btn-fill" data-toggle="modal" data-target="#modal_estadoProducto">+</button>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="guardar_producto" class="btn btn-info btn-fill">Guardar Producto</button>
                                        <button type="submit" name="actualizar_producto" class="btn btn-info btn-fill">Actualizar Producto</button>
                                        <button  name= "resetear" class="btn btn-info btn-fill">Resetear</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
            <div class="col-md-12">
                    <div id="tabla_productos">
                    </div>
                </div>
            </div>

<!-- Modal -->
<div class="modal fade" id="modal_categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Nueva categoria</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="hidden" class="form-control"name="" id="">
            <input type="text" class="form-control"name="" id="" placeholder="Nombre categoría">
            <input type="text" class="form-control"name="" id="" placeholder="Descipción categoría">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-fill" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-info btn-fill">Guardar categoria</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_estadoProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Nuevo estado de producto</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <input type="hidden" class="form-control"name="" id="">
            <input type="text" class="form-control"name="" id="" placeholder="Nombre estado producto">
            <input type="text" class="form-control"name="" id="" placeholder="Descipción estado producto">
        </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-fill" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-info btn-fill">Guardar estado producto</button>
      </div>
    </div>
  </div>
</div>

