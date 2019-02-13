<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 07.02.19
 * Time: 14:00
 */

namespace app\helpers;


use app\App;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{


    public static function sendPasswordResetMail($data)
    {
        //print_r($data);
        $mail = new PHPMailer();

        try {
            
            // $mail->SMTPDebug = 2;
            $mail->isSMTP();                                      
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;                               
            $mail->Username = '435d28e588960e';
            $mail->Password = 'b1ee7e13ccc008';
            $mail->SMTPSecure = 'tls';                            
            $mail->Port = 2525;

            $mail->CharSet = 'UTF-8';
            
            $mail->setFrom('noreply@supersystem.de', 'Password Reset Mailer');
            $mail->addAddress($data[0]->getEmail());

            $mail->isHTML(true);                                  
            $mail->Subject = 'Du hast dein Passwort vergessen!';
            $mail->Body    = "Hier hast du einen Link für ein neues :/ <br /><br />
                              <a href='" . $_SERVER['HTTP_ORIGIN'] . "?p=change_password&action=change_password&hash=".$data[1]."'>Klicke hier</a>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

}