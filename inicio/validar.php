<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 9/01/2018
 * Time: 10:52 PM
 */
$user =null;
$psw = null;
if(isset($_POST['usuario'])){
    $user = $_POST['usuario'];
    //echo $user;
}
else{
    echo "fallo";
}

if(isset($_GET['usuario'])){
    $user2 = $_GET['usuario'];
    //echo $user;
}
else{
    echo "fallo";
}

if(isset($_POST['pass'])){
    $psw = $_POST['pass'];
    //echo $psw;
}
else{
    echo "fallo";
}

if(isset($_GET['pass'])){
    $psw2 = $_GET['pass'];
    //echo $psw;
}
else{
    echo "fallo";
}

$con = mysqli_connect("localhost", "manuel","scout950911", "cuentas");

/*if(!$con)
    die("Fallo la conexion a MySQL: " . mysqli_error());
else
    echo "conexion exitosa";*/

if ($con) {
    $resultado = mysqli_query($con, "SELECT * FROM `users` WHERE `user` LIKE '" . $user . "'");
//$result = mysql_query("SELECT * from users where user='" . $usuario . "'");
    $respuesta = mysqli_fetch_all($resultado);

    if ($respuesta) {
        if ($respuesta[0][2] == $psw) {
            session_start();
            $_SESSION['username'] = $user;
            $_SESSION['super-id'] = $respuesta[0][0];
            $_SESSION['sesion'] = $respuesta[0][5];
            $_SESSION['usuario'] = $respuesta[0][3];
            $_SESSION['salario'] = $respuesta[0][4];
            $_SESSION['e-mail'] = $respuesta[0][6];
            if ($respuesta[0][5] == admin) {
                header("Location: /Cuentas/home/home.php");
            } else {
                header("Location: /Cuentas/home/home.php");
            }

        } else {
            //header("Location: index.html");
            echo '<script language="javascript">alert("Contraseña incorrecta"); window.location.href="index.php"</script>';
            exit();
        }
    } else {
        //header("Location: index.html");
        /*echo '<script language="javascript">alert("Usuario inexistente"); window.location.href="index.php"</script>';
        exit();*/
    }
}
else{
    echo "<script>alert('Sin conexion a base de datos');window.location.href='index.php'</script>";
}
?>