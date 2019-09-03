<?php
session_start();
//$con = mysqli_connect("localhost", "manuel","scout950911", "cuentas");
//if ($con){
    //$resultado = mysqli_query($con, "SELECT * FROM `users` WHERE `user` LIKE '" . $_SESSION['user_correo'] . "'");
    //$respuesta = mysqli_fetch_all($resultado);
    //if ($respuesta){
        //$to = $respuesta[0][6];
        $to = "msscout11@gmail.com";
        $subject = "Reestablecer Contraseña";
        //$usuario = $respuesta[0][1];
        $usuario = "msarevalo";
        $nombre = "Manuel";
        $pass = "Prueba";
    //}
//}
//$to = 'msscout11@gmail.com'; // note the comma
// Subject
//$subject = 'Pruebas';
// Message
$message = '
<html>
    <head>
        <title>Reestablecer Contraseña</title>
    </head>
    <body>
    <label>Haga click en el siguiente link para reestablecer la contraseña</label>
    <a href="http://localhost:63342/Cuentas/inicio/validar.php?usuario=' . $usuario . '&pass=' . $pass . '">Cambiar mi contraseña</a>
</body>
</html>
';
// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
// Additional headers
$headers[] = 'To: ' . $nombre . ' <' . $to . '>';
$headers[] = 'From: Soporte Cuentas <soporte@cuentas.com>';
// Mail it
if (mail($to, $subject, $message, "From: soporte@cuentas.com" . implode("\r\n", $headers))){
    echo "<script>alert('Mensaje de reestablecer contraseña enviado'); window.location.href='README.md'</script>";
}else{
    echo "<script>alert('Algo ha pasado')</script>";
}
?>