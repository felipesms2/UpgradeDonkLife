<?php
include "./DBPass.php";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$_POST['subject'] = "Registro de nova conta";
$_POST['personName'] = "Felipe";
$_POST['bodyMsg'] = "Bem vindo(a) ". $_POST['personName'] ." para completar seu cadastro clique aqui";

$subjectMSG = $_POST['subject']; 
$bodyMSG = $_POST['bodyMsg']; 
$personName = $_POST['personame']; 
var_dump($_SERVER);
die;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $serverSMTP;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $userSMTP;                     //SMTP username
    $mail->Password   = $passSMTP;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = $portSMTP;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //Recipients
    $mail->setFrom($userSMTP, 'DonkLife');
    //$mail->addAddress('felipesms@live.com', 'Felipe');     //Add a recipient
    //$mail->addAddress('fmbh.1989@gmail.com');               //Name is optional
    $mail->addAddress('teste@2fsoft.com');               //Name is optional
    $mail->addReplyTo($userSMTP, 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subjectMSG;
    $mail->Body    = $bodyMSG;
    $mail->AltBody = 'Caso não consiga visualizar a mensagem entre diretamente em contato com ' . $userSMTP;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
