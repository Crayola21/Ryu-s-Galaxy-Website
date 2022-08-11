
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Proveedor</h4>
                                </div>
                                <div class="card-body">
                                    <form class="formregistro_proveedor" id="registro_proveedor"method="POST">
                                        <div class="row">
                                            <div class="col-md-2 px-2">
                                                <div class="form-group">
                                                    <label>Identificación</label>
                                                    <input type="text" class="form-control" name="Identificacion" placeholder="Número de identificación">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-2">
                                                <div class="form-group">
                                                    <label>Nombres</label>
                                                    <input type="text" class="form-control" name="NombresProveedor" placeholder="Nombres Proveedor">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-2">
                                                <div class="form-group">
                                                    <label for="Apellidoslbl">Apellidos</label>
                                                    <input type="text" class="form-control" name="ApellidosProveedor" placeholder="Apellidos Proveedor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 px-2">
                                                <div class="form-group">
                                                    <label>Pais</label>
                                                    <input type="text" class="form-control" name="PaisProveedor" placeholder="País del proveedor">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-2">
                                                <div class="form-group">
                                                    <label>Cuidad</label>
                                                    <input type="text" class="form-control" name="CiudadProveedor" placeholder="Ciudad del proveedor">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-2">
                                                <div class="form-group">
                                                    <label>Correo eléctonico</label>
                                                    <input type="email" class="form-control" name="EmailProveedor" placeholder="Correo eléctronico proveedor">
                                                </div>
                                        </div>
                                        <div class="row">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 px-2">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="text" class="form-control" name="TelefonoProveedor" placeholder="Teléfono Proveedor">
                                                </div>
                                            </div>
                                            <div class="col-md-2 px-2">
                                                <div class="form-group">
                                                    <label>Celular</label>
                                                    <input type="text" class="form-control" name="CelularProveedor" placeholder="Celular proveedor">
                                                </div>
                                            </div>
                                        <div class="col-md-2 my-auto">
                                        <button type="submit" name="registro_proveedor" class="btn btn-info btn-fill mt-auto ">Guardar proveedor</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-plain table-plain-bg">
                    <div class="card-header ">  
                        <h4 class="card-title">Proveedores</h4>
                    </div>
                    <div class="table-responsive table-full-width" id="tabla_proveedores">
                        
                    </div>
                </div>
            </div>
            

