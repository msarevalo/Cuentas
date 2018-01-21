<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 20/01/2018
 * Time: 9:37 PM
 */
session_start();
if (isset($_POST['act_name'])){
    $nombre = $_POST['act_name'];
}

if (isset($_POST['act_salario'])){
    $salario = $_POST['act_salario'];
}

if (isset($_POST['act_correo'])){
    $correo = $_POST['act_correo'];
}

$con = mysqli_connect("localhost", "manuel","scout950911", "cuentas");

$act = mysqli_query($con, "UPDATE `users` SET `name` = '" . $nombre . "', `salary` = '" . $salario . "', `email` = '" . $correo . "' WHERE `users`.`id_user` = " . $_SESSION['super-id'] . ";");
$resultado = mysqli_query($con, "SELECT * FROM `users` WHERE `user` LIKE '" . $_SESSION['username'] . "'");
//$result = mysql_query("SELECT * from users where user='" . $usuario . "'");
$respuesta = mysqli_fetch_all($resultado);
$_SESSION['usuario'] = $respuesta[0][3];
$_SESSION['salario'] = $respuesta[0][4];
$_SESSION['e-mail'] = $respuesta[0][6];
//echo "<script>alert('" . $editar . "')";
echo "<script>alert('Se actualizaron tus datos correctamente'); window.location.href='../home/home.php'</script>";