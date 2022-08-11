<?php 
    require_once  Clase . 'Db.php' ;
    /**
     * Clase registro de usuarios
     */
    class registro_usuarios extends Db{

        public $IdUsuario;
        public $NombreUsuario;
        public $EmailUsuario;
        public $ContrasenaUsuario;
        public $FK_IdRolUsuario ;

        /**
         * Funcion para registrar usuarios
         * 
         * @return void
         */
        public function add_user(){
            $sql = 'INSERT INTO usuario (
                NombreUsuario,
                EmailUsuario,
                ContrasenaUsuario,
                FK_IdRolUsuario

            ) VALUES (
                :NombreUsuario,
                :EmailUsuario,
                :ContrasenaUsuario,
                :FK_IdRolUsuario
            )';
           $data = [
               "NombreUsuario"     => $this->NombreUsuario,
               "EmailUsuario"      => $this->EmailUsuario,
               "ContrasenaUsuario" => $this->ContrasenaUsuario,
               "FK_IdRolUsuario"   => $this->FK_IdRolUsuario
           ];

           try {
                // if($this->IdUsuario = parent::query($sql, $data)){
                //     return $this->IdUsuario;
                // }else{
                //     return false;
                // }
              return ($this->IdUsuario = parent::query($sql, $data)) ? $this->IdUsuario : false;
           } catch (Exception $e) {
               throw $e;
           }
          
        }

        /**
         * Funcion para validar si el usuario existe en la base de datos 
         * 
         * @return boolean
         */
        public function validar_usuario(){
            $sql = 'SELECT IdUsuario,  NombreUsuario FROM usuario WHERE NombreUsuario = :NombreUsuario ';
            $data = [
                "NombreUsuario" => $this->NombreUsuario
            ];

            try {
              return (parent::query($sql, $data)) ? true : false;
           } catch (Exception $e) {
               throw $e;
           }
            
        }

    }