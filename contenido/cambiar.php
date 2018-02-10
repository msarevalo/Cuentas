<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 20/01/2018
 * Time: 11:11 PM
 */

session_start();

$con = mysqli_connect("localhost", "manuel","scout950911", "cuentas");

if (isset($_POST['nuevaContraseña'])){
    $nueva = $_POST['nuevaContraseña'];
}

if (isset($_POST['confContraseña'])){
    $confirma = $_POST['confContraseña'];
}


if ($nueva == $confirma){
    $cambio = mysqli_query($con, "UPDATE `users` SET `pass` = '" . $nueva . "' WHERE `users`.`id_user` = " . $_SESSION['super-id'] . ";");
    $anular = mysqli_query($con, "UPDATE `users` SET `second_pass` = '' WHERE `users`.`id_user` = " . $_SESSION['super-id'] . ";");
    echo "<script>alert('Se cambio correctamente la contraseña'); window.location.href='../home/home.php'</script>";
}else{
    echo "<script>alert('Las contraseñas no coinciden');window.location.href='CambiarContraseña.php'</script>";
}