<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 20/01/2018
 * Time: 4:47 PM
 */

if (isset($_POST['name'])){
    $nombre = $_POST['name'];
}

if (isset($_POST['salario'])){
    $salario = $_POST['salario'];
}

if (isset($_POST['cuenta'])){
    $cuenta = $_POST['cuenta'];
}

if (isset($_POST['correo'])){
    $correo = $_POST['correo'];
}

$con = mysqli_connect("localhost", "manuel","scout950911", "cuentas");

$editar = mysqli_query($con, "UPDATE `users` SET `name` = '" . $nombre . "', `salary` = '" . $salario . "', `user_type` = '" . $cuenta . "', `email` = '" . $correo . "' WHERE `users`.`id_user` = " . $_SESSION['id'] . ";");

echo "<script>alert('" . $editar . "')";
//echo "<script>alert('Usuario " . $_SESSION['con_user'] . "actualizado correctamente')";