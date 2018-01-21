<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 20/01/2018
 * Time: 11:41 PM
 */
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
<div id="inicio" name="inicio">
    <form method="post" action="validar.php">
        <table>
            <tr>
                <td>
                    <label>Usuario:</label>
                </td>
                <td>
                    <input type="text" id="usuario" name="usuario" placeholder="Usuario" required/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Contraseña:</label>
                </td>
                <td>
                    <input type="password" id="pass" name="pass" placeholder="Contraseña" required/>
                </td>
            </tr>
        </table>
        <center><input type="checkbox" id="mostrar" onchange="mostrarContraseña()"><label>Mostar contraseña</label>
        <br />
        <input type="submit" value="Iniciar Sesion"><br /><br />
        <a href="">Olvide mi contraseña</a><br /></center>
    </form>
</div>
</body>
</html>
