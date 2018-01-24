<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 23/01/2018
 * Time: 10:39 PM
 */
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'autoload.php';

$mail = new PHPMailer(true);


$con = mysqli_connect("localhost", "manuel","scout950911", "cuentas");

if ($con){
    $resultado = mysqli_query($con, "SELECT * FROM `users` WHERE `user` LIKE '" . $_SESSION['user_correo'] . "'");
    $respuesta = mysqli_fetch_all($resultado);

    if ($respuesta){
        $de = "<sol.sof6@gmail.com>";
        $destinatario = $respuesta[0][6];
        $asunto = "Reestablecer contraseña";
        $usuario = $respuesta[0][1];
        $pass = $respuesta[0][7];

        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.googlemail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sol.soft6@gmail.com';
            $mail->Password = 'jsrtujeqollncnke';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom($destinatario, $usuario);

            $mail->isHTML(true);

            $mail->Subject = $asunto;
            $mail->Body = "<html> 
                            <head> 
                                <title>reestablecer contraseña</title> 
                            </head> 
                            <body> 
                                <label>Para reetablecer contraseña has clic en el siguiente hipervinculo</label><br />
                                <a href='validar.php?usuario=" . $usuario . "&pass=" . $pass . "'>Reestablecer</a> 
                            </body> 
            </html> ";

            if (!$mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                echo "<script>alert('Mensjae enviado')</script>";
            }

        }catch (\Exception $e){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}

?>