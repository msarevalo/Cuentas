<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 20/01/2018
 * Time: 11:06 PM
 */
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../home/admin.css" type="text/css" rel="stylesheet">
    <script src="../home/admin.js"></script>
    <meta charset="UTF-8">
    <?php
    echo "<title>Cuentas de " . $_SESSION['usuario'] . "</title>";
    ?>
</head>
<body>
<div id="menu" name="menu" style="min-height: 100vh">
    <ul class="horizontal">
        <strong>
            <br /><li><?php echo "<label style='color: #ccc; padding: 10px 10px 10px 50px; text-decoration: none;text-transform: uppercase;'>Usuario:</label>"?></li>
            <li><?php echo "<label style='display: block; text-align: justify-all; padding: 10px 10px 10px 50px; color: #C6C87A; text-decoration: none;text-transform: uppercase;'>" . $_SESSION['usuario'] . "</label>"?></li>
        <em><li><a style="background: brown">Cambiar Contraseña</a></li>
            <img style="display: block; cursor: pointer; margin: 15px 0px 0px 60px" src="../imagenes/logout%20(1).png" onclick="location.href='cerrar.php'">
    </ul>
</div>
<div id="cambiarContraseña" name="cambiarContraseña">
    <header>Cambiar Contraseña</header>
    <form method="post" autocomplete="off" action="../contenido/cambiar.php">
        <table>
            <tr>
                <td>
                    <label>Nueva Contraseña</label>
                </td>
                <td>
                    <input type="text" id="nuevaContraseña" name="nuevaContraseña" placeholder="Nueva Contraseña" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Confirmar Contraseña</label>
                </td>
                <td>
                    <input type="text" id="confContraseña" name="confContraseña" placeholder="Confirmar Contraseña" required>
                </td>
            </tr>
        </table>
        <center><input type="submit" value="Cambiar"></center>
    </form>
</div>
</body>