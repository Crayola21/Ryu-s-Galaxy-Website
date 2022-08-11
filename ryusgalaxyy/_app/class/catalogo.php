<?php 
    require_once Clase . 'Db.php';
    require_once Clase . 'Csrf.php';
    require_once Clase . 'core_functions.php';
    class  Catalogo extends Db{
        public $producto;
        public $nuevo_tokken = NULL;
        public $cantidad = 0;
        public $total = 0;
        public $tokken_consulta ;
        public $id_producto;
        public $id_usuario;

        // Carga los productos en la vista de categorias
        public function load_prodructs(){
            $sql = 'SELECT * FROM producto WHERE cantidad <> 0';
            try {
                return ($this->IdProducto = parent::query($sql)) ? $this->IdProducto : false;

            } 
            
            catch (Exception $e) {
                throw $e;
            }
        }

        // Agrega productos al carrito haciendo uso de la funcion guardar_temporal
        public function agregar_al_carrito(){
            $sql = 'SELECT * FROM producto WHERE IdProducto = :IdProducto';
            $data =[
                'IdProducto' => $this->producto
            ];
            try {
                ($row = parent::query($sql, $data)) ? $row : false;
                    $this->nuevo_tokken = $this->actualizar_tokken();
                    if($this->nuevo_tokken == NULL){
                        $this->nuevo_tokken =  $this->$this->actualizar_tokken();
                    }

                    if(Csrf::validate($this->nuevo_tokken, true)){
                        //  return $this->nuevo_tokken;
                        if($response = $this->buscar_producto_temporal($this->nuevo_tokken, $row[0]['IdProducto'] )){
                            $this->cantidad =  $response[0]['cantidad'] + 1;
                            $total_producto = $row[0]['Precio'] * $this->cantidad;
                            // return $total_producto . " " . $response[0]['cantidad'];
                            $this->actualizar_id($this->nuevo_tokken,  $this->id_usuario);
                            return $this->actualizar_producto_temporal($row[0]['IdProducto'], $this->cantidad , $this->nuevo_tokken, $total_producto,  $this->id_usuario);
                        }

                        else{
                            $this->guardar_temporal($this->nuevo_tokken, $row[0]['IdProducto'],$row[0]['NombreProducto'], "PENDIENTE", 1, $row[0]['Precio'], $this->id_usuario);      
                            return "guardado";                         
                        }
                    }else{
                        session_destroy();
                        $this->nuevo_tokken = $this->actualizar_tokken();
                    }
                
            } 
            
            catch (Exception $e) {
                throw $e;
            }
        }

        // Actualiza y crea tokken
        public function actualizar_tokken(){
            $tokken_user = new Csrf();
            $this->nuevo_tokken = $_SESSION['csrf_token']['token'];
            return $this->nuevo_tokken;
        }


        public function guardar_temporal($tokken, $id_producto, $nombre_producto, $ruta_imagen, $cantidad, $total, $id_usuario){
            $sql = 'INSERT INTO pedido_temporal(
                tokken,
                id_producto,
                nombre_producto,
                ruta_imagen,
                cantidad,
                total,
                id_usuario
            ) VALUES(
                :tokken,
                :id_producto,
                :nombre_producto,
                :ruta_imagen,
                :cantidad,
                :total,
                :id_usuario
            )';
            $data =[
                'tokken'          => $tokken,
                'id_producto'     => $id_producto,
                'nombre_producto' => $nombre_producto,
                'ruta_imagen'     => $ruta_imagen,
                'cantidad'        => $cantidad,
                'total'           => $total,
                'id_usuario'      => $id_usuario
            ];
            try {
                (parent::query($sql, $data)) ? true : false;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        // Busca si existe el producto en la tabla temporal
        public function buscar_producto_temporal($tokken, $id_producto){
            $sql = 'SELECT *, P.Precio
            FROM pedido_temporal PD
            LEFT JOIN  producto P ON (PD.id_producto =  P.IdProducto)
            WHERE 
            tokken = :tokken 
            AND id_producto = :id_producto';
            $data =[
                'tokken'      => $tokken,
                'id_producto' => $id_producto
            ];
            try {
                return ($row = parent::query($sql, $data)) ? $row : false;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        // Actualiza los totales y la cantidad en la tabla
        public function actualizar_producto_temporal($id_producto, $cantidad, $tokken, $total, $id_user){
            $sql = 'UPDATE pedido_temporal SET cantidad = :cantidad, total = :total, id_usuario = :id_usuario WHERE id_producto = :id_producto  AND tokken = :tokken';
            $data =[
                'tokken'      => $tokken,
                'id_producto' => $id_producto,
                'cantidad'    => $cantidad,
                'total'       => $total,
                'id_usuario'  => $id_user
            ];
            try {
                return (parent::query($sql, $data)) ? true : false;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        // Actualiza el id_ cuando el usuario inicia sesión
        public function actualizar_id($tokken, $id_user){
            $sql = 'UPDATE pedido_temporal SET id_usuario = :id_usuario WHERE  tokken = :tokken';
            $data =[
                'tokken'      => $tokken,
                'id_usuario'  => $id_user
            ];
            try {
                return (parent::query($sql, $data)) ? true : false;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        // Adicioa un producto utilizando el boton + de la vista 
        public function adicionar_producto($tokken, $id_producto, $cantidad){
            if(  $response= $this->buscar_producto_temporal($tokken, $id_producto )){
                $cantidadact = $this->cantidad =  $response[0]['cantidad'] +  $cantidad;
                $total_producto = $response[0]['Precio'] ;
                $total = (($this->cantidad )* $total_producto) ;
            }
            $sql = 'UPDATE pedido_temporal SET cantidad = :cantidad, total = :total  WHERE id_producto = :id_producto  AND tokken = :tokken';
            $data =[
                'tokken'      => $tokken,
                'id_producto' => $id_producto,
                'cantidad'    => $cantidadact  ,
                'total'       => $total,
            ];
            try {
                return (parent::query($sql, $data)) ? true : false;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        // Elimina 1 producto de la vista haciendo uso del boton -
        public function remover_producto($tokken, $id_producto, $cantidad){
            if(  $response= $this->buscar_producto_temporal($tokken, $id_producto )){
                $cantidadact = $this->cantidad =  $response[0]['cantidad'] -  $cantidad;
                $total_producto = $response[0]['Precio'] ;
                $total = (($this->cantidad ) * $total_producto) ;
            }
            $sql = 'UPDATE pedido_temporal SET cantidad = :cantidad, total = :total  WHERE id_producto = :id_producto  AND tokken = :tokken';
            $data =[
                'tokken'      => $tokken,
                'id_producto' => $id_producto,
                'cantidad'    => $cantidadact  ,
                'total'       => $total,
            ];
            try {
                return (parent::query($sql, $data)) ? true : false;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        // Muestra los contadores con el total y la cantidad de productos ingresados
        public function mostrar_contadores(){
            $sql = 'SELECT SUM(cantidad) as CONTADOR,
            (SELECT SUM(total) 
                FROM pedido_temporal  WHERE tokken = :tokken ) AS SUMA
            FROM pedido_temporal
            WHERE tokken = :tokken';
            $data =[
                'tokken'      => $this->tokken_consulta,
            ];
            try {
                ($row = parent::query($sql, $data)) ? $row : false;
                setlocale(LC_MONETARY, 'en_US');
                if($row[0]['CONTADOR'] === NULL ){
                    $cont = "0";
                }else{
                    $cont = $row[0]['CONTADOR'];
                }
                $datos =[
                    "contador" => $cont,
                    "total"    => number_format($row[0]['SUMA'])
                ];
                return $datos;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        // Elimina un producto de la tabla temporal
        public function eliminar_producto($tokken, $id_producto){
            $sql = 'DELETE FROM pedido_temporal  WHERE id_producto = :id_producto  AND tokken = :tokken';
            $data =[
                'id_producto' => $id_producto,
                'tokken'      => $tokken,
                
            ];
            try {
                return  ( parent::query($sql, $data)) ? true : false;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }
        

        // Lista los productos agregados al carrito
        public function listar_productos_carrito(){
            $sql = 'SELECT *,
            (SELECT SUM(total) 
                FROM pedido_temporal PD  WHERE tokken = :tokken ) AS SUMA
            FROM pedido_temporal PD
            LEFT JOIN producto P  ON (PD.id_producto = P.IdProducto)
            WHERE tokken = :tokken';
            $data =[
                'tokken'      => $this->tokken_consulta,
            ];
            try {
                ($row = parent::query($sql, $data)) ? $row : false;
                if($row ){
                    if($row > 0){
                        $total =number_format($row[0]['SUMA']);
                        $table = '
                            <div class="shoping__cart__table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="shoping__product">Producto</th>
                                            <th>Pecio</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                <tbody>
                            ';
                        for ($i=0; $i < count($row); $i++) { 
                            $table .= '<tr>
                                            <td class="shoping__cart__item">
                                                <img src="img/cart/cart-1.jpg" alt="">
                                                <h5>'.$row[$i]['nombre_producto'].'</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                '. number_format($row[$i]['Precio']) .'
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <a class="dec qtybtn" data-id="'.$row[$i]['id_producto'].'" name="removeproducto" >-</a>
                                                            <input type="text" value="'.$row[$i]['cantidad'].'">
                                                        <a class="inc qtybtn" data-id="'.$row[$i]['id_producto'].'" name="addproducto"  >+</a></div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                '. number_format($row[$i]['total']) .'
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <i data-id="'.$row[$i]['id_producto'].'" name="eliminar_producto"  class="fas fa-times bg-danger p-2 text-light"></i>
                                            </td>';
                            $table .='</tr>';
                            
                            } 
                            $table .= '
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="shoping__cart__btns">
                                    <a href= " ' . rutaRaiz. "catalogo" . ' " class="primary-btn cart-btn">CONINUAR COMPRARNDO</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="shoping__checkout">
                                    <h5>Cart Total</h5>
                                    <ul>
                                        <li>Total <span>$ '." " .  number_format($row[0]['SUMA']).'</span></li>
                                    </ul>
                                    <a href="#" name="realizarPedido" class="primary-btn">REALIZAR PEDIDO</a>
                                </div>
                            </div>
                        </div>
                    </div>';

                return $table;

                    }else{
                        $table = '
                            <div class="shoping__cart__table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="shoping__product">Producto</th>
                                            <th>Pecio</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                <tbody>
                        ';
                        $table .= '
                            <div class="alert alert-warning" role="alert">
                            No hay nada el carrito
                        </div>
                        ';
                    }

                    return $table;
                }else{
                    $table = '
                            <div class="shoping__cart__table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="shoping__product">Producto</th>
                                            <th>Pecio</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                <tbody>
                        ';
                        $table .= '
                            <tr>
                                <td colspan="4" class="text-center">
                                    <div class="alert alert-warning" role="alert">
                                        No hay nada el carrito
                                    </div>
                                </td>
                            </tr>
                        ';
                        return $table;
                }
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        // Finaliza el pedido, lo pasa a las tablas pedido y detalle pedido y luego elimina de la tabla temporal
        public function realizar_pedido($tokken){
            $response =  $this->consultar_id_user($tokken);
            if(is_null($response[0]['id_usuario'])){
                return false;
            }else{
                $total =   $this->totalizar_pedido($tokken, $_SESSION[ID_USUARIO] );
                $detalle = $this->totalizar_pedido_detalle($tokken, $_SESSION[ID_USUARIO] );
                $data = [
                    "total" => $total,
                    "detalle" =>$detalle
                ];
                json_decode (json_encode($data));
                // return  ;

                $ultimo_id =   $this->guardar_pedido_final(
                        core_functions::NoW(),
                        $data['total'][0]['suma'],
                        1,
                        $detalle[0]['id_usuario']
                    ); 
                    for ($i=0; $i < count($detalle) ; $i++) { 
                        $this->guardar_pedido_detallado($detalle[$i]['cantidad'],$detalle[$i]['total'], $detalle[$i]['id_producto'],  $ultimo_id ); 
                    }
                    for ($i=0; $i < count($detalle); $i++) { 
                        $this->eliminar_producto($tokken, $detalle[$i]['id_producto']);
                    }
                return true;
                    
            }

        }

        // Consulta si existe el id de usuario en la tabla temporal
        public function consultar_id_user($tokken){
            $sql = 'SELECT id_usuario FROM  pedido_temporal WHERE  tokken = :tokken';
            $data =[
                'tokken'      => $tokken,
            ];
            try {
                return  ( $row = parent::query($sql, $data)) ? $row : false;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        // Totalila el pedido 
        function totalizar_pedido($tokken, $id_usuario){
            $sql = 'SELECT SUM(total) AS suma FROM  pedido_temporal WHERE  tokken = :tokken AND id_usuario = :id_usuario ';
            $data =[
                'tokken'      => $tokken,
                'id_usuario'  =>$id_usuario
            ];
            try {
                return  ( $row = parent::query($sql, $data)) ? $row : false;
            } 
            catch (Exception $e) {
                throw $e; 
            }
        }

        // Totaliza casa producto para saber su cantidad el total del precio
        function totalizar_pedido_detalle($tokken, $id_usuario){
            $sql = 'SELECT * FROM  pedido_temporal WHERE  tokken = :tokken AND id_usuario = :id_usuario ';
            $data =[
                'tokken'      => $tokken,
                'id_usuario'  => $id_usuario
            ];
            try {
                return  ( $row = parent::query($sql, $data)) ? $row : false;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        // Guarda el pedido en la tabla pedido
        public function guardar_pedido_final($fecha, $total, $estado, $usuario){
            $sql = 'INSERT INTO pedido (
                FechaPedido,
                Total,
                FK_IdEstadoPedido,
                FK_IdUsuario
            )VALUES (
                :FechaPedido,
                :Total,
                :FK_IdEstadoPedido,
                :FK_IdUsuario
            )';
            $data =[
                'FechaPedido'       => $fecha,
                'Total'             => $total,
                'FK_IdEstadoPedido' => $estado,
                'FK_IdUsuario'      => $usuario
            ];
            try {
                return  ( $id = parent::query($sql, $data)) ? $id : false;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        // Guarda el detalle de cada producto en la tabla detalle pedido
        public function guardar_pedido_detallado($cantidad, $subtotal, $id_producto, $id_pedido){
            $sql = 'INSERT INTO detallepedido_producto (
                CantidadProducto,
                Subtotal,
                FK_IdProducto,
                FK_IdPedido
            )VALUES (
                :CantidadProducto,
                :Subtotal,
                :FK_IdProducto,
                :FK_IdPedido
            )';
            $data =[
                'CantidadProducto' => $cantidad,
                'Subtotal'         => $subtotal,
                'FK_IdProducto'    => $id_producto,
                'FK_IdPedido'      => $id_pedido
            ];
            try {
                return  ( $id = parent::query($sql, $data)) ? $id : false;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

    }