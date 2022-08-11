<?php 
    include_once Clase . 'mail.php';
    
    class core_functions{
        
        public static function Now(){
            return date('Y-m-d H:i:s');
        }

        
        public static function  to_object($array) {
            return json_decode(json_encode($array));
        }

        public static function crypt_pass(){
            $Pass = core_functions::getToken(10);
            $salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
            $salt = strtr($salt, array('+' => '.'));
            $hash = crypt($Pass, '$2y$10$' . $salt);
            
            $crypt = [
                "contrasena_db"   => $hash,
                "contrasena_user" => $Pass
            ];

            return $crypt;
        }

       

     
        public static  function send_password($destinatario, $password){
            $mensaje  = "<div style='background-color: white;margin: 4rem;padding: 1rem;border: 2px solid #ccc;text-align: center;'>";
            $asunto   = "Datos usuario Ryu's Galaxy Tienda Online";
            $mensaje .= "<div style='font:15px Century Gothic;text-align: left'>¡Hola!, </div><br><br>";
            $mensaje .= "<div style='font:15px Century Gothic;text-align: left'> Deseamos darte la bienvenida a <strong style='color:#85BB25'>Ryu's Galaxy</strong>, la tienda online donde podrás encontrar deliciosos dulces japoneses</div><br><br>";
            $mensaje .= "<div style='font:15px Century Gothic;text-align: left'>Esperamos que disfrutes de todos los productos que tenemos para ofrecerte.</div> <br> " ;
            $mensaje .= "<div style='font:15px Century Gothic;text-align: left'>Tus datos de acceso a nuestro sistema:</div> <br> " ;
            $mensaje .= "<div style='font:15px Century Gothic;text-align: left text-align: center; margin: 0 auto; align-content: center'>";
            $mensaje .= "<p style='text-align: left; font:15px Century Gothic;'><strong style='color:#85BB25'>Usuario:</strong> ". $destinatario ." </p> ";
            $mensaje .= "<p style='text-align: left; font:15px Century Gothic;'><strong style='color:#85BB25'>Contraseña:</strong> ". $password ." </p> ";
            $mensaje .= "</div>";
            $mensaje .= "<div style='font:15px Century Gothic; color:#26317a;'><a style='background-color: #85BB25 ; color: #fff; text-align: center; padding: 10px 20px; border-radius: 5px; text-decoration: none' href='".rutaRaiz."solicitud"."' target='_blank'>Ingresar</a></div><br><br>";
            $mensaje .= "<div style='font:15px Century Gothic; font-weight: bold'>Este mensaje ha sido generado automáticamente. Por favor <strong>  NO </strong> lo responda.</div><br><br>";
            $mensaje .= "<div style='font:15px Century Gothic;text-align: left'>Atentamente, </div><br>";
            $mensaje .= "<div style='font:15px Century Gothic;text-align: left; padding: 0'>El equipo de Ryu's Galaxy, </div>";
            $mensaje .= "</div>";
            $mail = new Mail();
            if ($mail->sendHtml($destinatario, $asunto, $mensaje))
                return true;
            else
                return false;
        }

        public static function getToken($length){
            $token = "";
            $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
            $codeAlphabet .= "0123456789";
            for ($i = 0; $i < $length; $i++) {
                $token .= $codeAlphabet[core_functions::crypto_rand_secure(0, strlen($codeAlphabet))];
            }
            return $token;
        }
        
        public static function crypto_rand_secure($min, $max){
            $range = $max - $min;
            if ($range < 0) {
                return $min;
            }
    
            $log = log($range, 2);
            $bytes = (int) ($log / 8) + 1;
            $bits = (int) $log + 1;
            $filter = (int) (1 << $bits) - 1;
            do {
                $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
                $rnd = $rnd & $filter;
            } while ($rnd >= $range);
            return $min + $rnd;
        }

        /**
         * Funcion para ocultar partes e un texto 
         * 
         * @return void
         */
        public static function  ocultar_string($str, $start = 1, $end = 1){
            $len = strlen($str);
            return substr($str, 0, $start) . str_repeat('*', $len - ($start + $end)) . substr($str, $len - $end, $end);
        }

    }