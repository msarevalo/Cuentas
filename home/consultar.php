<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 17/01/2018
 * Time: 12:42 AM
 */
session_start();

if(isset($_POST['auser'])){
    $auser = $_POST['auser'];
}
$_SESSION['mostrar'] = "none";
$con = mysqli_connect("localhost", "manuel","scout950911", "cuentas");

$consulta = mysqli_query($con,"SELECT * FROM `users` WHERE `user` LIKE '" . $auser . "'");
$aconsulta = mysqli_fetch_array($consulta);
//echo $aconsulta[1];

if ($aconsulta){
    $_SESSION['con_user'] = $aconsulta[1];
    $_SESSION['con_name'] = $aconsulta[3];
    $_SESSION['con_sal'] = $aconsulta[4];
    //echo "<script>alert('" . $_SESSION['con_user'] . ", " . $_SESSION['con_name'] . ", " . $_SESSION['con_sal'] . "'); /*window.location.href='EditarUsuario.php'*/</script>";

}else{
    echo "<script>alert('Usuario Inexistente'); window.location.href='EditarUsuario.php'</script>";
}


?>