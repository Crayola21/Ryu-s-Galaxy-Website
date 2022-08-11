<?php 
    include_once Clase . 'Csrf.php';
    include_once Clase . 'Db.php';
    class login extends Db{

        public $IdUsuario;
        public $NombreUsuario;
        public $EmailUsuario;
        public $ContrasenaUsuario;
        public $token;

        /**
         * Metodo para iniciar sesión
         */
        public function login_usuario(){
            if(Csrf::validate($this->token)){
                try {
                    $sql = 'SELECT IdUsuario, 
                    NombreUsuario, 
                    EmailUsuario, 
                    ContrasenaUsuario, 
                    FK_IdRolUsuario FROM usuario WHERE (NombreUsuario = :NombreUsuario OR EmailUsuario = :EmailUsuario) LIMIT 1 ';
                    $data =[
                        "NombreUsuario" => $this->NombreUsuario,
                        "EmailUsuario"  => $this->EmailUsuario
                    ];

                    $response = ($rows = parent::query($sql, $data)) ? $rows[0] : false;
                    if ( !$response ) {
                        return false;
                    }
                    if($this->ContrasenaUsuario == $response['ContrasenaUsuario']){
                            $_SESSION[ID_USUARIO] = $response['IdUsuario'];
                            $info = [
                                "nombre" => $response['NombreUsuario'],
                                "email"  => $response['EmailUsuario'],
                                "rol"    => $response['FK_IdRolUsuario']
                            ];
                            return $info;
                    }else{
                        return false;
                    }

                    
                } catch (Exception $e) {
                    throw $e;
                }
            }else{
                return false;
            }


        }
    }