<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//require '././vendor/autoload.php';

class Mail
{
    private $mail;
	
    public function __construct()
    {
        $this->mail               = new PHPMailer;
        $this->mail->isSMTP();
        $this->mail->SMTPDebug    = 0;
        $this->mail->Host         = IP_SERVIDOR;
        $this->mail->Port         = 587;
        $this->mail->SMTPAuth     = true;
        $this->mail->SMTPAutoTLS  = true;
        $this->mail->SMTPSecure   = "TLS";
        $this->mail->Username     = remitente;
        $this->mail->Password     = passCorreo;
        $this->mail->setFrom(remitente);
        $this->mail->CharSet      = 'UTF-8';
    }

    public function sendHtml($address, $subject, $html)
    {
        //$this->mail->SMTPDebug = SMTP::DEBUG_CONNECTION;
        $this->mail->isHTML(true);
        $email = explode(";",$address);
        $nun = count($email);
        for ($i=0; $i < $nun; $i++) { 
            $this->mail->addAddress($email[$i]);
        }
        $this->mail->Subject = $subject;
        $this->mail->msgHTML($html);
        if($this->mail->send()){
            return true;
        }
        echo 'Mailer error: '.$this->mail->ErrorInfo;
        return false;
    }
	
    public function sendText($address, $subject,$text)
    {
        $this->mail->addAddress($address);
        $this->mail->Subject = $subject;
        $this->mail->Body= $text;
        if($this->mail->send()){
            return true;
        }
        echo 'Mailer error: '.$this->mail->ErrorInfo;
        return false;
    }
}