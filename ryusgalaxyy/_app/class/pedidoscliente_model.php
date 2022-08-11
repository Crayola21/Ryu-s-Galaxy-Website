<?php 
    include_once Clase .'Db.php';
    class Pedidos_cliente extends Db{
        public $id_usuario;

        public function listar_pedidos_cliente(){
            $sql = 'SELECT *,
                    (SELECT SUM(Total) FROM pedido WHERE FK_IdUsuario = :FK_IdUsuario  )AS SUMA
                FROM pedido P
                LEFT JOIN detallepedido_producto DP ON (DP.FK_IdPedido = P.IdPedido)
                LEFT JOIN producto PRTO ON (PRTO.IdProducto = DP.FK_IdProducto)
                WHERE FK_IdUsuario = :FK_IdUsuario
            ';
            $data =[
                'FK_IdUsuario'      => $this->id_usuario,
            ];
            try {
                ($row = parent::query($sql, $data)) ? $row : false;
                if($row ){
                    if($row > 0){
                        $table = '
                        <div class="shoping__cart__table">
                            <table class="table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <th class="">Fecha Pedido</th>
                                        <th>Estado</th>
                                        <th>Cantidad</th>
                                        <th>Nombre</th>
                                        <th>Sub total</th>
                                    </tr>
                                </thead>
                            <tbody>
                        ';
                        for ($i=0; $i < count($row) ; $i++) { 
                            $table .= '<tr>
                                <td class="shoping__cart__price">
                                    '. $row[$i]['FechaPedido'] .'
                                </td>';
                                if( $row[$i]['FK_IdEstadoPedido'] == 1){
                                    $table .= '
                                        <td class="shoping__cart__price">
                                            Pendiente
                                        </td>
                                    ';
                                }else if($row[$i]['FK_IdEstadoPedido'] == 2){
                                    $table .= '
                                    <td class="shoping__cart__price">
                                        Pendiente Entrega
                                    </td>
                                ';
                                }else{
                                    $table .= '
                                    <td class="shoping__cart__price">
                                        Entregado
                                    </td>
                                ';
                                }
                                $table .= ' <td class="shoping__cart__total">
                                    '.$row[$i]['CantidadProducto'] .'
                                </td>';
                                $table .= ' <td class="shoping__cart__total">
                                '.$row[$i]['NombreProducto'] .'
                                </td>';
                                $table .= ' <td class="shoping__cart__total">
                                '.$row[$i]['Subtotal'] .'
                                </td>';
                                
                                // $table .= ' <td class="shoping__cart__item__close" >
                                //     <i data-id="" name="eliminar_producto"  class="fas fa-times bg-danger p-2 text-light"></i>
                                // </td>';
                            $table .='</tr>';
                        }
                        $table .= '
                        <tr><td colspan="7"><div class="alert alert-info" role="alert">
                            <h3>Total Pedido: $'.number_format($row[0]['SUMA']). '</h3>
                        </div></tr></td>
                        ';
                    }

                    return $table;
                }
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        public function pedidos_por_cliente(){
            $sql = 'SELECT *, U.NombreUsuario
                    FROM pedido P
                    LEFT JOIN usuario U ON (P.FK_IdUsuario = U.IdUsuario)';
            try {
                ($row = parent::query($sql)) ? $row : false;
                if($row){
                    if(count($row) != 0){
                        $table = '<table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Fecha Pedido</th>
                                <th>Correo Electronico</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Cambiar estado</th>
                                <th>Detalle</th>
                            </tr>
                        </thead> <tbody>';
                        
                        for ($i=0; $i <  count($row) ; $i++) { 
                            $table .= '<tr class="text-center">';
                            $table .= '<td> ' .$row[$i]['FechaPedido'] . ' </td>';
                            $table .= '<td> ' .$row[$i]['EmailUsuario'] . ' </td>';
                            $table .= '<td> ' .$row[$i]['Total'] . ' </td>';
                        
                            if($row[$i]['FK_IdEstadoPedido'] == 1){
                                $table .= '<td class="bg-info text-white"> Pendiente </td>';
                            }else if($row[$i]['FK_IdEstadoPedido'] == 2){
                                $table .= '<td class="bg-warning text-white"> Pendiente Entrega </td>';
                            }else if($row[$i]['FK_IdEstadoPedido'] == 3){
                                $table .= '<td class="bg-success text-white"> Entregado </td>';
                            }else{
                                $table .= '<td class="bg-danger text-white"> Cancelado </td>';
                            }
                            $table .= '<td>';
                            if($row[$i]['FK_IdEstadoPedido'] == 3){
                                $table .= '
                                <button type="button" class="btn btn-warning hidden" data-id="'.$row[$i]['IdPedido'].'" name="PendienteEntrega">Pendiente Entrega</button>
                                <button type="button" class="btn btn-success hidden" data-id="'.$row[$i]['IdPedido'].'" name="Entregado">Entregado</button>
                                <button type="button" class="btn btn-danger hidden" data-id="'.$row[$i]['IdPedido'].'" name="Cancelado">Cancelado</button>
    
                                ';
                            }else{
                                $table .= '
                                <button type="button" class="btn btn-warning " data-id="'.$row[$i]['IdPedido'].'" name="PendienteEntrega">Pendiente Entrega</button>
                                <button type="button" class="btn btn-success " data-id="'.$row[$i]['IdPedido'].'" name="Entregado">Entregado</button>
                                <button type="button" class="btn btn-danger " data-id="'.$row[$i]['IdPedido'].'" name="Cancelado">Cancelado</button>
    
                                ';
                            }

                            $table .= '</td>';
                            $table .= '<td> 
                            <button type="button" class="btn btn-info" data-id="'.$row[$i]['IdPedido'].'" name="verdetalle1">Ver Detalle</button>
                            
                            </td>';
                            $table .= '</tr>';   
                        }
                        
                        $table .= '
                        </tbody>
                        </table>
                        ';
                    }
                    return $table;
                }else{
                    $table = '<table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Fecha Pedido</th>
                            <th>Total</th>
                            <th>Correo Electronico</th>
                            <th>Estado</th>
                            <th>Detalle</th>
                        </tr>
                    </thead>';
                    $table .='
                    <tr colspan="5">
                        <td colspan="5" >No hay pedidos que mostrar</td>
                    <tr>
                    ';
                }
                return $table;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        public function  mis_pedidos($id_producto){
            $sql = 'SELECT *
            FROM detallepedido_producto DP 
            LEFT JOIN producto P ON (DP.FK_IdProducto = P.IdProducto) 
            LEFT JOIN pedido PD ON (DP.FK_IdPedido = PD.IdPedido)
            WHERE FK_IdPedido = :FK_IdPedido';

            $data = [
                'FK_IdPedido' => $id_producto
            ];
            try {
                ($row = parent::query($sql, $data)) ? $row : false;
                if($row){
                    if(count($row) != 0){
                        $table = '<table id="example1" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Sub total</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                            </tr>
                        </thead> <tbody>';
                        
                        for ($i=0; $i <  count($row) ; $i++) { 
                            $table .= '<tr>';
                            $table .= '<td> ' .$row[$i]['CantidadProducto'] . ' </td>';
                            $table .= '<td> ' .$row[$i]['Subtotal'] . ' </td>';
                            $table .= '<td> ' .$row[$i]['NombreProducto'] . ' </td>';
                            $table .= '<td> ' .$row[$i]['Precio'] . ' </td>';
                            if($row[$i]['FK_IdEstadoPedido'] == 1){
                                $table .= '<td class="bg-info text-dark"> Pendiente </td>';
                            }else if($row[$i]['FK_IdEstadoPedido'] == 2){
                                $table .= '<td class="bg-warning text-dark"> Pendiente Entrega </td>';
                            }else if($row[$i]['FK_IdEstadoPedido'] == 3){
                                $table .= '<td class="bg-success text-white"> Entregado </td>';
                            }else{
                                $table .= '<td class="bg-danger text-white"> Cancelado </td>';
                            }
                            $table .= '</tr>';   
                        }
                        
                        $table .= '
                        </tbody>
                        </table>
                        ';
                    }
                    return $table;
                }else{
                    $table = '<table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Fecha Pedido</th>
                            <th>Total</th>
                            <th>Correo Electronico</th>
                            <th>Estado</th>
                            <th>Detalle</th>
                        </tr>
                    </thead>';
                    $table .='
                    <tr colspan="4">
                        <td colspan="5" >No hay pedidos que mostrar</td>
                    <tr>
                    ';
                }
                return $table;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        public function pedidos_por_cliente_detallado($id_producto){
            $sql = 'SELECT *
            FROM detallepedido_producto DP 
            LEFT JOIN producto P ON (DP.FK_IdProducto = P.IdProducto) 
            LEFT JOIN pedido PD ON (DP.FK_IdPedido = PD.IdPedido)
            WHERE FK_IdPedido = :FK_IdPedido';

            $data = [
                'FK_IdPedido' => $id_producto
            ];
            try {
                ($row = parent::query($sql, $data)) ? $row : false;
                if($row){
                    if(count($row) != 0){
                        $table = '<table id="example1" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Sub total</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                            </tr>
                        </thead> <tbody>';
                        
                        for ($i=0; $i <  count($row) ; $i++) { 
                            $table .= '<tr>';
                            $table .= '<td> ' .$row[$i]['CantidadProducto'] . ' </td>';
                            $table .= '<td> ' .$row[$i]['Subtotal'] . ' </td>';
                            $table .= '<td> ' .$row[$i]['NombreProducto'] . ' </td>';
                            $table .= '<td> ' .$row[$i]['Precio'] . ' </td>';
                            if($row[$i]['FK_IdEstadoPedido'] == 1){
                                $table .= '<td class="bg-info text-dark"> Pendiente </td>';
                            }else if($row[$i]['FK_IdEstadoPedido'] == 2){
                                $table .= '<td class="bg-warning text-dark"> Pendiente Entrega </td>';
                            }else if($row[$i]['FK_IdEstadoPedido'] == 3){
                                $table .= '<td class="bg-success text-white"> Entregado </td>';
                            }else{
                                $table .= '<td class="bg-danger text-white"> Cancelado </td>';
                            }
                            $table .= '</tr>';   
                        }
                        
                        $table .= '
                        </tbody>
                        </table>
                        ';
                    }
                    return $table;
                }else{
                    $table = '<table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Fecha Pedido</th>
                            <th>Total</th>
                            <th>Correo Electronico</th>
                            <th>Estado</th>
                            <th>Detalle</th>
                        </tr>
                    </thead>';
                    $table .='
                    <tr colspan="5">
                        <td colspan="5" >No hay pedidos que mostrar</td>
                    <tr>
                    ';
                }
                return $table;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }

        public function cambiar_estado($id_producto, $opc){
            $sql = 'UPDATE pedido SET FK_IdEstadoPedido = :FK_IdEstadoPedido WHERE IdPedido = :IdPedido';
            $data =[
                'FK_IdEstadoPedido'      => $opc,
                'IdPedido' => $id_producto,

            ];
            try {
                return (parent::query($sql, $data)) ? true : false;
            } 
            catch (Exception $e) {
                throw $e;
            }
        }   

    }