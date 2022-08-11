<?php
    require_once Clase . 'Db.php';


    class categoria extends Db{

        public $IdCategoria;
        public $NombreCategoria;
        public $DescripcionCategoria;

        /* Función para insertar productos a la base de datos */

        public function agregar_categoria(){
            $sql = 'INSERT INTO categoria (
                NombreCategoria,
                DescripcionCategoria
                ) VALUES (
                :NombreCategoria,
                :DescripcionCategoria
            )';
            $data = [
                "NombreCategoria"        => $this->NombreCategoria,
                "DescripcionCategoria"   => $this->DescripcionCategoria,
            ];
            try {
                return ($this->IdCategoria = parent::query($sql, $data)) ? $this->IdCategoria : false;

            } 
            
            catch (Exception $e) {
                throw $e;
            }
        }
        public function listar_categorias(){
            $sql = 'SELECT IdCategoria, NombreCategoria, DescripcionCategoria FROM categoria';
            try {
                $opcion = '<option selected disabled> Seleccione categoria</option>';
                if ($categoria = parent::query($sql)) {
                    if (count($categoria) > 0) {
                        for ($i=0; $i < count($categoria) ; $i++) { 
                            $opcion .= '<option value="'.$categoria[$i]['IdCategoria'].'">' .$categoria[$i]['NombreCategoria'] . '</option>';
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