<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 20/01/2018
 * Time: 6:05 PM
 */

session_start();

if (isset($_POST['euser'])){
    $eliminar = $_POST['euser'];
}

$con = mysqli_connect("localhost", "manuel","scout950911", "cuentas");

$consulta = mysqli_query($con,"SELECT * FROM `users` WHERE `user` LIKE '" . $eliminar . "'");
$econsulta = mysqli_fetch_array($consulta);
$id = $econsulta[0];

if ($econsulta){
    if ($_SESSION['username'] != $eliminar) {
        //echo ($confirmar = "<script>confirm('¿Seguro que sedea eliminar al usuario " . $eliminar . "?')</script>");
        //if ($confirmar == true){
            mysqli_query($con, "DELETE FROM `users` WHERE `users`.`id_user` = " . $id);
            echo "<script>alert('Usuario " . $eliminar . " fue eliminado con exito'); window.location.href='EliminarUsuario.php'</script>";
            //echo "Confirmar es " . $confirmar;
        /*}else{
            echo "<script>window.location.href='EliminarUsuario.php'</script>";
        }*/
    }else{
        echo "<script>alert('No se puede eliminar a si mismo'); window.location.href='EliminarUsuario.php'</script>";
    }
}else{
    echo "<script>alert('Usuario Inexistente'); window.location.href='EliminarUsuario.php'</script>";
}