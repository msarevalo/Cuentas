<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 22/01/2018
 * Time: 7:39 PM
 */

session_start();

$pass = rand(999, 99999);
$password_hash=md5($pass);

if (isset($_POST['usuario'])){
    $user = $_POST['usuario'];
}

$con = mysqli_connect("localhost", "manuel","scout950911", "cuentas");

if ($con){
    $resultado = mysqli_query($con, "SELECT * FROM `users` WHERE `user` LIKE '" . $user . "'");
    $respuesta = mysqli_fetch_all($resultado);

    if ($respuesta){
        if (!empty($respuesta[0][7])){
            $actual = mysqli_query($con, "UPDATE `users` SET `second_pass` = '" . $password_hash . "' WHERE `users`.`id_user` = " . $respuesta[0][0] . ";");
            header("Location: /Cuentas/inicio/correo.php");
            $_SESSION['user_correo'] = $user;
        }else{
            $actual = mysqli_query($con, "UPDATE `users` SET `second_pass` = '" . $password_hash . "' WHERE `users`.`id_user` = " . $respuesta[0][0] . ";");
            header("Location: /Cuentas/inicio/correo.php");
            $_SESSION['user_correo'] = $user;
        }
    }else{
        echo "<script>alert('Usuario " . $user . " inexistente');window.location.href='rememberPass.php'</script>";
    }
}else{
    echo "<script>alert('Sin conexion a base de datos');window.location.href='index.php'</script>";
}
?>