<?php

namespace Framework\BlackPearl;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mail
{
    public static function sendMail(
        $senderMail,
        $senderAppPassword,
        $setFrom,
        $setFromName,
        $recieverEmail,
        $replyToEmail,
        $replyToName,
        $subject,
        $body
    )
    {
        //Load Composer's autoloader
        require 'vendor/autoload.php';
    
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
    
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $senderMail;                     //SMTP username
        $mail->Password   = $senderAppPassword;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom($setFrom, $setFromName);
        $mail->addAddress($recieverEmail); //Add a recipient
        $mail->addReplyTo($replyToEmail, $replyToName);
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        return $mail->send();
    }
}