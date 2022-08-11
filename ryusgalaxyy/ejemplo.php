<?php
    require_once("config.php");
    require_once('vendor/autoload.php');
    require_once(Clase . 'tools.php');
    require_once(Clase . 'mail.php');
    $anulaciones = new solicitudesPendientes();
    class solicitudesPendientes{
        private $asunto;
        private $mensaje;

        /**
         * constructor de la clase
         */
        public  function __construct()
        {
            $this->consultar_pendientes();
        }

        /**
         * Funcion para consultar las solicitudes que tiene cada jefe
         *
         * @return void
         */
        private  function consultar_pendientes(){
  
          $this->enviar_email("fabio_developer@hotmail.com");
               
        }

        /**
         * Metodo para enviar el correo a cada jefe
         *
         * @return boolean
         */
        private function enviar_email($destinatario){
            $mensaje  = $this->mensaje  = "<div style='background-color: white;margin: 4rem;padding: 1rem;border: 2px solid #ccc;text-align: center;'>";
            $asunto   = $this->asunto   = "Solicitud pendiente de aprobación";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic;text-align: left'>Cordial saludo, </div><br><br>";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic;text-align: left'>Desde el área de <strong style='color:#85BB25'>Cadena de Suministro</strong> le queremos recordar que usted cuenta con una solicitud pendiente por aprobación</div><br><br>";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic;text-align: left'>A continuación le mostramos el detalle:</div> <br> " ;
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic;text-align: left text-align: center; margin: 0 auto; align-content: center'>";
            $mensaje .= $this->mensaje  = "<p style='text-align: left; font:15px Century Gothic;'><strong style='color:#85BB25'>Proveedor o contratista:</strong> proveedor </p> ";
            $mensaje .= $this->mensaje  = "<p style='text-align: left; font:15px Century Gothic;'><strong style='color:#85BB25'>Nit :</strong> nit </p> ";
            $mensaje .= $this->mensaje  = "<p style='text-align: left; font:15px Century Gothic;'><strong style='color:#85BB25'>Actividad Principal :</strong> actividad</p> ";
            $mensaje .= $this->mensaje  = "<p style='text-align: left; font:15px Century Gothic;'><strong style='color:#85BB25'>Fecha de la solicitud :</strong> fecha registro </p> ";
            $mensaje .= $this->mensaje  = "<p style='text-align: left; font:15px Century Gothic;'><strong style='color:#85BB25'>Solicitante:</strong> solicitante </p><br> ";
            $mensaje .= $this->mensaje  = "</div>";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic;text-align: center'>Le solicitamos amablemente que genere la <strong>aprobación o rechazo</strong> de esta solicitud, para poder continuar con el proceso.</div><br><br>";
            $mensaje .= "<div style='font:15px Century Gothic; color:#26317a;'><a style='background-color: #85BB25 ; color: #fff; text-align: center; padding: 10px 20px; border-radius: 5px; text-decoration: none' href='".rutaRaiz."solicitud"."' target='_blank'>Ingresar</a></div><br><br>";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic; font-weight: bold'>Este mensaje ha sido generado automáticamente. Por favor <strong>  NO </strong> lo responda.</div><br><br>";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic;text-align: left'>Cordialmente, </div><br>";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic;text-align: left; padding: 0'>Cadena de Suministro, </div>";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic;text-align: left; padding: 0'>Coninsa Ramón H. S.A. </div>";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic;text-align:left; padding: 0'>Dirección. <a href='https://maps.google.com/?q=Cll+55+No+45+55+Medell%C3%ADn+%E2%80%93+Colombia&entry=gmail&source=g' target='_blank'> Cll 55 No 45 55</a></div>";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic;text-align: left; padding: 0'>Medellín – Colombia, </div>";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic;text-align: left; padding: 0'>Línea Ética:  018000 123 110. </div><br>";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic; text-align:left; padding: 0'>Ahora nuestras cuentas de correo son @<a href='http://coninsa.co/' target='_blank'>coninsa.co</a></div>";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic;text-align: left'>Coninsa Ramón H. S.A. </div><br>";
            $mensaje .= $this->mensaje  = "<div style='font:15px Century Gothic;text-align: left'><img style='text-align: left' src='https://www.coninsa.co/sites/default/files/logo_coninsa-01.png' width='20%' > </div><br>";
            $mensaje .= $this->mensaje  = "</div>";
            $mail = new Mail();
            if ($mail->sendHtml($destinatario, $asunto, $mensaje))
                return true;
            else
                return false;
        }

    }