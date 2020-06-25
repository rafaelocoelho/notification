<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email {

    private $mail = \stdClass::class;
    
    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->mail->SMTPDebug = false;                      // Enable verbose debug output
        $this->mail->isSMTP();                                            // Send using SMTP
        $this->mail->Host       = 'smtp.mailgun.org';                     // Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->mail->Username   = 'postmaster@sandbox2cddff41c34e47bfb3da459c5ba366f3.mailgun.org';                     // SMTP username
        $this->mail->Password   = '757212f42c01144b2e15f114972b6201-1b6eb03d-f80eee81';                               // SMTP password
        $this->mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port       = 587;
        $this->mail->CharSet    = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);
        $this->mail->setFrom('eu.rafaelcoelho@gmail.com', 'Rafael');
    }
    
    public function send($subject, $body, $replayEmail, $replayName, $addressMail, $addressName) {
     
        $this->mail->Subject = (string)$subject;
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replayEmail, $replayName);
        $this->mail->addAddress($addressMail, $addressName);

        try 
        {
            $this->mail->send();

        } catch (\Exception $error) {

            echo "Erro ao enviar e-mail: {$this->mail->ErrorInfo} {$error->getMessage()}";

        }

        echo "E-mail enviado!";

    }
}