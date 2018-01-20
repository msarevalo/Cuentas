<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 16/01/2018
 * Time: 11:04 PM
 */
session_start();

unset($nuser, $npass, $nname, $nsal, $ncue, $ncorreo);
if (isset($_POST['newuser'])){
    $nuser = $_POST['newuser'];
}

if (isset($_POST['newpass'])){
    $npass = $_POST['newpass'];
}

if (isset($_POST['conpass'])){
    $cpass = $_POST['conpass'];
}

if (isset($_POST['name'])){
    $nname = $_POST['name'];
}

if (isset($_POST['salario'])){
    if ($_POST['salario'] == 0){
        $nsal = null;
    }else {
        $nsal = $_POST['salario'];
    }
}else{
    $nsal = null;
}

if (isset($_POST['cuenta'])){
    $ncue = $_POST['cuenta'];
}

if (isset($_POST['correo'])){
    $ncorreo = $_POST['correo'];
}

$con = mysqli_connect("localhost", "manuel","scout950911", "cuentas");

if ($npass == $cpass) {
    $crearUsuario = mysqli_query($con, "INSERT INTO `users` (`id_user`, `user`, `pass`, `name`, `salary`, `user_type`, `email`) VALUES (NULL, '" . $nuser . "', '" . $npass . "', '" . $nname . "', '" . $nsal . "', '" . $ncue . "', '" . $ncorreo . "');");
    if ($crearUsuario == 1){
        echo "<script>alert('El usuario " . $nuser . " fue creado con exito'); window.location.href='CrearUsuario.php'</script>";
    }else{
        echo "<script>alert('El usuario " . $nuser . " ya se encuentra registrado'); window.location.href='CrearUsuario.php'</script>";
    }
    //echo $crearUsuario;
}else{
    echo "<script>alert('Las contraseñas no coinciden'); window.location.href='CrearUsuario.php'</script>";
}

?>