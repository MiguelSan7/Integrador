<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include'../class/database.php';
$db=New Database();
$db->conectarDB();
session_start();

//Load Composer's autoloader
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'oscare.alvarado17@gmail.com';                     //Correo del don toys
    $mail->Password   = 'igybzfaahhtsbrmt';                               //la contra de la verificacion de 2 pasos
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('oscare.alvarado17@gmail.com', 'Don Toys');
    $mail->addAddress(''.$_SESSION['CorreoUsua'].'');     //La direccion a la cual se va a mandar
                 //Name is optional

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Poner diseño a esta cosa, pues es lo que se verá
    $mail->Subject = 'REGISTRO EXITOSO';
    $mail->Body    = 'SU CUENTA SE HA CREADO EXITOSAMENTE, BIENVENIDO A LA FAMILIA TOYS';
   //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<div class='alert alert-success'> Cliente Registrado</div>";
    echo 'Bienvenido a la experiencia Toys';
} catch (Exception $e) {
    echo "ERROR, MAIL NO EXISTENTE, FAVOR DE AGREGAR UN NUEVO CORREO";
    $db->ejecutarSQL("UPDATE USUARIOS SET ESTADO='INACTIVO' WHERE USUARIO.CORREO='".$_SESSION['CorreoUsua']."'");
}
$db->desconectarDB();