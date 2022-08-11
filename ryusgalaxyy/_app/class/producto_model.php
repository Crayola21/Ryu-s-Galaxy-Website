<?php
    require_once Clase . 'Db.php';


    class producto extends Db{

        public $IdProducto;
        public $NombreProducto;
        public $Precio;
        public $Cantidad;
        public $FechaVencimiento;
        public $Descripcion;
        public $RutaFotoProducto;
        public $FK_IdCategoria;
        public $FK_IdEstadoProducto;
        public $idProducto;

        /* Función para insertar productos a la base de datos */

        public function agregar_producto(){
            $sql = 'INSERT INTO producto (
                NombreProducto,
                Precio,
                Cantidad,
                FechaVencimiento,
                Descripcion,
                RutaFotoProducto,
                FK_IdCategoria,
                FK_IdEstadoProducto
                ) VALUES (
                :NombreProducto,
                :Precio,
                :Cantidad,
                :FechaVencimiento,
                :Descripcion,
                :RutaFotoProducto,
                :FK_IdCategoria,
                :FK_IdEstadoProducto  
            )';
            $data = [
                "NombreProducto"        => $this->NombreProducto,
                "Precio"                => $this->Precio,
                "Cantidad"              => $this->Cantidad,
                "FechaVencimiento"      => $this->FechaVencimiento,
                "Descripcion"           => $this->Descripcion,
                "RutaFotoProducto"      => $this->RutaFotoProducto,
                "FK_IdCategoria"        => $this->FK_IdCategoria,
                "FK_IdEstadoProducto"   => $this->FK_IdEstadoProducto
            ];
            try {
                return ($this->IdProducto = parent::query($sql, $data)) ? $this->IdProducto : false;

            } 
            
            catch (Exception $e) {
                throw $e;
            }
        }
        public function listar_productos(){
        
            $sql = 'SELECT producto.IdProducto, producto.NombreProducto, producto.Precio, producto.Cantidad, producto.FechaVencimiento,
            producto.Descripcion, producto.RutaFotoProducto, categoria.NombreCategoria, estadoproducto.NombreEstadoProducto FROM producto
            INNER JOIN categoria ON producto.FK_IdCategoria=categoria.IdCategoria           
            INNER JOIN estadoproducto ON producto.FK_IdEstadoProducto=estadoProducto.IdEstadoProducto';
            try {
             
              if( $rows = parent::query($sql)){
                if(count($rows) > 0 ){
                    $table = '<table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>FechaVencimiento</th>
                            <th>Descripcion</th>
                            <th>Foto</th>
                            <th>Categoria</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                    for ($i=0; $i < count($rows); $i++) { 
                        $table .= '<tr>';
                            $table .= '<td>'.$rows[$i]['NombreProducto'].'</td>';
                            $table .= '<td>'.$rows[$i]['Precio'].'</td>';
                            $table .= '<td>'.$rows[$i]['Cantidad'].'</td>';
                            $table .= '<td>'.$rows[$i]['FechaVencimiento'].'</td>';
                            $table .= '<td>'.$rows[$i]['Descripcion'].'</td>';
                            $table .= '<td>'.$rows[$i]['RutaFotoProducto'].'</td>';
                            $table .= '<td>'.$rows[$i]['NombreCategoria'].'</td>';
                            $table .= '<td>'.$rows[$i]['NombreEstadoProducto'].'</td>';
                            $table .= '<td><button class="btn btn-warning btn-fill" type="button" name= "btnEditar" id="btnEditar" data_id="'.$rows[$i]['IdProducto'].'"> <i class="fa fa-edit"></i> </button></td>';
                            $table .= '<td><button class="btn btn-danger btn-fill" id="btnEliminar" data_id="'.$rows[$i]['IdProducto'].'"><i class="fa fa-times-circle"></i></button></td>';
                        $table .= '</tr>';
                    }
                    $table .= '</tbody>';
                    $table .= '</table>';
                    return $table;
                }else{
                    $response = '<div class="alert alert-primary"> NO HAY REGISTRO </div>';
                    return $response  ;
                }
              }else{
                  return false;
              }
           } catch (Exception $e) {
               throw $e;
           }
            
        }

        public function u_producto( ){
          
            try {
                $sql = 'SELECT IdProducto, NombreProducto, Precio, Cantidad, FechaVencimiento,
                Descripcion, RutaFotoProducto, FK_IdCategoria, FK_IdEstadoProducto FROM producto WHERE IdProducto = :idProducto';
                $data = [
                    "idProducto" => $this->idProducto
                ];
    
                $producto = parent::query($sql, $data);
                $datos = [
                    "idproducto"    => $producto[0]['IdProducto'],
                    "nombre"        => $producto[0]['NombreProducto'],
                    "precio"        => $producto[0]['Precio'],
                    "cantidad"      => $producto[0]['Cantidad'],
                    "fechav"        => $producto[0]['FechaVencimiento'],
                    "descripcion"   => $producto[0]['Descripcion'],
                    "ruta"          => $producto[0]['RutaFotoProducto'],
                    "idcategoria"   => $producto[0]['FK_IdCategoria'],
                    "idestado"      => $producto[0]['FK_IdEstadoProducto']

                ];
                    return $datos;

            } 
            
            catch (Exception $e) {
                throw $e;
            }
            return $producto;
        }  

        public function modificar_producto(){
            $sql = 'UPDATE producto SET
                NombreProducto = :NombreProducto,
                Descripcion = :Descripcion,
                Precio      = :Precio,
                Cantidad = :Cantidad,
                FechaVencimiento = :FechaVencimiento,
                RutaFotoProducto = :RutaFotoProducto,
                FK_IdCategoria = :FK_IdCategoria,
                FK_IdEstadoProducto = :FK_IdEstadoProducto

                WHERE
                IdProducto = :IdProducto';
            $data = [
                "NombreProducto"        => $this->NombreProducto,
                "Descripcion"           => $this->Descripcion,
                "Precio"                => $this->Precio,
                "Cantidad"              => $this->Cantidad,
                "FechaVencimiento"      => $this->FechaVencimiento,
                "RutaFotoProducto"      => $this->RutaFotoProducto,
                "FK_IdCategoria"        => $this->FK_IdCategoria,
                "FK_IdEstadoProducto"   => $this->FK_IdEstadoProducto,
                "IdProducto"            => $this->IdProducto
            ];
            
            try {
                return parent::query($sql, $data) ? true : false;
            } 
            
            catch (Exception $e) {
                throw $e;
            }
        }
        public function inhabilitar_producto(){
            $sql = 'UPDATE producto SET
                FK_IdEstadoProducto = :FK_IdEstadoProducto
                WHERE
                IdProducto = :IdProducto';
            $data = [
                "FK_IdEstadoProducto" => $this->FK_IdEstadoProducto,
                "IdProducto"          => $this->IdProducto
            ];
            
            try {
                return parent::query($sql, $data) ? true : false;
            } 
            
            catch (Exception $e) {
                throw $e;
            }
        }
    }