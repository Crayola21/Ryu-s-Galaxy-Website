<?php
    require_once Clase . 'Db.php';


    class estadoProducto extends Db{

        public $IdEstadoProducto;
        public $NombreEstadoProducto;
        public $DescripcionEstadoProducto;

        /* Función para insertar productos a la base de datos */

        public function agregar_estadoProducto(){
            $sql = 'INSERT INTO estadoproducto (
                NombreEstadoProducto,
                DescripcionEstadoProducto
                ) VALUES (
                :NombreEstadoProducto,
                :DescripcionEstadoProducto
            )';
            $data = [
                "NombreEstadoProducto"        => $this->NombreEstadoProducto,
                "DescripcionEstadoProducto"   => $this->DescripcionEstadoProducto,
            ];
            try {
                return ($this->IdEstadoProducto = parent::query($sql, $data)) ? $this->IdEstadoProducto : false;

            } 
            
            catch (Exception $e) {
                throw $e;
            }
        }
        public function listar_estadosProducto(){
            $sql = 'SELECT IdEstadoProducto, NombreEstadoProducto, DescripcionEstadoProducto FROM estadoproducto';
            try {
                $opcion = '<option selected disabled>Seleccione estado</option>';
                if ($estadoProducto = parent::query($sql)) {
                    if (count($estadoProducto) > 0) {
                        for ($i=0; $i < count($estadoProducto) ; $i++) { 
                            $opcion .= '<option value="'.$estadoProducto[$i]['IdEstadoProducto'].'">'.$estadoProducto[$i]['NombreEstadoProducto'] . '</option>';
                        }
                        return $opcion;
                    }    
                }else{
              return false;
            }
           } catch (Exception $e) {
               throw $e;    
           }
            
        }
    }