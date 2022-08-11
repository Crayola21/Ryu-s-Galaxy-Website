<?php 
    require_once Clase . 'Db.php';
    require_once Clase . 'Csrf.php';
    require_once Clase . 'core_functions.php';

    class Rol extends Db{

        public function permisos_por_usuario($id_usuario){
            $sql = 'SELECT * FROM usuario WHERE  IdUsuario = :IdUsuario';
            $data =[
                'IdUsuario'  => $id_usuario
            ];
            try {
                ( $row = parent::query($sql, $data)) ? $row[0] : false;
                if( !$row ){
                    return false;
                }else{
                    $permiso = core_functions::to_object($row);
                    return (int)$permiso[0]->FK_IdRolUsuario;
                }
                
            } 
            catch (Exception $e) {
                throw $e;
            }
        }
    }