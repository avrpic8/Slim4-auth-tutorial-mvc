<?php

namespace App\Http\Services;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


class MailService
{
    public function send($emailAddress, $subject, $body): bool
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {

            $mail->CharSet = 'UTF-8';
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = getConfig()->get('MAIL.SMTP.Host');    //Set the SMTP server to send through
            $mail->SMTPAuth   = getConfig()->get('MAIL.SMTP.SMTPAuth');                                 //Enable SMTP authentication
            $mail->Username   = getConfig()->get('MAIL.SMTP.Username');  //SMTP username
            $mail->Password   = getConfig()->get('MAIL.SMTP.Password'); //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = getConfig()->get('MAIL.SMTP.Port');      //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom(getConfig()->get('MAIL.SMTP.setFrom.mail'), getConfig()->get('MAIL.SMTP.setFrom.name'));
            $mail->addAddress($emailAddress);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body  = $body;

            return $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}