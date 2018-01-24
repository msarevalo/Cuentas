<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 22/01/2018
 * Time: 6:49 PM
 */
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cuentas</title>
    <script type="text/javascript" src="logic.js"></script>
    <link rel="stylesheet" href="index.css" type="text/css" />
</head>
<body>
<div id="remember" name="remember">
    <header>Olvidé mi contraseña</header>
    <form method="post" action="enviar.php" autocomplete="off">
        <table>
            <tr>
                <td>
                    <label>Usuario</label>
                </td>
                <td>
                    <input type="text" placeholder="Usuario" id="usuario" name="usuario" required>
                </td>
            </tr>
        </table>
        <center><input type="submit" value="Enviar"></center>
    </form>
    <br /><center><a href="index.php">Volver</a></center>
</div>
</body>
