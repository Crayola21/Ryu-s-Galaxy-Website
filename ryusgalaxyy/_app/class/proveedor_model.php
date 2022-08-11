<?php
    require_once Clase . 'Db.php';


    class proveedor extends Db{

        public $IdProveedor;
        public $Identificacion;
        public $NombresProveedor;
        public $ApellidosProveedor;
        public $PaisProveedor;
        public $CiudadProveedor;
        public $EmailProveedor;
        public $TelefonoProveedor;
        public $CelularProveedor;

        /* Función para insertar proveedores a la base de datos */

        public function agregar_proveedor(){
            $sql = 'INSERT INTO proveedor (
                Identificacion,
                NombresProveedor,
                ApellidosProveedor,
                PaisProveedor,
                CiudadProveedor,
                EmailProveedor,
                TelefonoProveedor,
                CelularProveedor
                ) VALUES (
                :Identificacion,
                :NombresProveedor,
                :ApellidosProveedor,
                :PaisProveedor,
                :CiudadProveedor,
                :EmailProveedor,
                :TelefonoProveedor,
                :CelularProveedor  
            )';
            $data = [
                "Identificacion"        => $this->Identificacion,
                "NombresProveedor"      => $this->NombresProveedor,
                "ApellidosProveedor"    => $this->ApellidosProveedor,
                "PaisProveedor"         => $this->PaisProveedor,
                "CiudadProveedor"       => $this->CiudadProveedor,
                "EmailProveedor"        => $this->EmailProveedor,
                "TelefonoProveedor"     => $this->TelefonoProveedor,
                "CelularProveedor"      => $this->CelularProveedor
            ];
            try {
                return ($this->IdProveedor = parent::query($sql, $data)) ? $this->IdProveedor : false;

            } 
            
            catch (Exception $e) {
                throw $e;
            }
        }
        public function listar_proveedores(){
        
            $sql = 'SELECT IdProveedor, Identificacion, NombresProveedor, ApellidosProveedor, PaisProveedor,
            CiudadProveedor, EmailProveedor, TelefonoProveedor, CelularProveedor FROM proveedor';
            try {
             
              if( $rows = parent::query($sql)){
                if(count($rows) > 0 ){
                    $table = '<table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Identificación</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>País</th>
                            <th>Ciudad</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Celular</th>
                        </tr>
                    </thead>
                    <tbody>';
                    for ($i=0; $i < count($rows); $i++) { 
                        $table .= '<tr>';
                            $table .= '<td> ' .$rows[$i]['Identificacion'] . ' </td>';
                            $table .= '<td> ' .$rows[$i]['NombresProveedor'] . ' </td>';
                            $table .= '<td> ' .$rows[$i]['ApellidosProveedor'] . ' </td>';
                            $table .= '<td> ' .$rows[$i]['PaisProveedor'] . ' </td>';
                            $table .= '<td> ' .$rows[$i]['CiudadProveedor'] . ' </td>';
                            $table .= '<td> ' .$rows[$i]['EmailProveedor'] . ' </td>';
                            $table .= '<td> ' .$rows[$i]['TelefonoProveedor'] . ' </td>';
                            $table .= '<td> ' .$rows[$i]['CelularProveedor'] . ' </td>';
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
    }