<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 20/01/2018
 * Time: 7:14 PM
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
        <?php
        if($_SESSION['username'] == null){
            header("Location: /Cuentas/inicio/cerrar.php");
        }
        ?>
        <strong>
            <br /><li><?php echo "<label style='color: #ccc; padding: 10px 10px 10px 50px; text-decoration: none;text-transform: uppercase;'>Usuario:</label>"?></li>
            <li><?php echo "<label style='display: block; text-align: justify-all; padding: 10px 10px 10px 50px; color: #C6C87A; text-decoration: none;text-transform: uppercase;'>" . $_SESSION['usuario'] . "</label>"?></li>
            <li><?php echo "<lavel style='color: #ccc; padding: 10px 10px 10px 30px; text-decoration: none;text-transform: uppercase;'>Salario Base:</lavel>" ?></li>
            <li><?php
                if ($_SESSION['salario']==null || $_SESSION['salario']==0){
                    echo "<button type='button' style='padding: 3px 3px 3px 3px; margin: 10px' onclick=\"location.href='ActualizarDatos.php'\">Debes actualizar tus datos</button>";
                }else{
                    echo "<lavel style='text-align: justify-all; color: #C6C87A; padding: 10px 10px 10px 50px; text-decoration: none;text-transform: uppercase;'>$ " . number_format($_SESSION['salario'],0,',','.') . "</lavel><br /><br /><br />";
                }
                ?></li></strong>
        <em><?php
            if($_SESSION['sesion'] == "admin"){
                echo "<li><a href='../home/CrearUsuario.php'>Crear Usuario</a></li>
                         <li><a href=\"../home/EditarUsuario.php\">Editar Usuario</a></li>
                         <li><a href=\"../home/EliminarUsuario.php\">Eliminar Usuario</a></li>
                         <li><a href=\"../home/ListarUsuarios.php\">Listar Usuarios</a></li>";
            }
            ?>
            <li><a style="background: brown" href="../contenido/ActualizarDatos.php">Actualizar Mis Datos</a></li>
            <li><a href="CambiarContraseña.php">Cambiar Contraseña</a></li>
            <li><a onclick="">Mis Movimientos</a></li>
            <li><a onclick="">Simular Movimiento</a></li></em>
            <img style="display: block; cursor: pointer; margin: 15px 0px 0px 60px" src="../imagenes/logout%20(1).png" onclick="location.href='../inicio/cerrar.php'">
    </ul>
</div>
<div id="actualizar" name="actualizar">
    <header>Actualizar mis Datos</header>
    <form method="post" action="actualizar.php">
        <table>
            <tr>
                <td>
                    <label>Nombre</label>
                </td>
                <td>
                    <?php
                    echo "<input type='text' id='act_name' name='act_name' required value='" . $_SESSION['usuario'] . "'>"
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Salario</label>
                </td>
                <td>
                    <?php
                    echo "<input type='number' step='0.01' id='act_salario' name='act_salario' required value='" . $_SESSION['salario'] . "'>"
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Correo</label>
                </td>
                <td>
                    <?php
                    echo "<input type='email' id='act_correo' name='act_correo' required value='" . $_SESSION['e-mail'] . "'>"
                    ?>
                </td>
            </tr>
        </table>
        <center><input type="submit" value="Actualizar"></center>
    </form>
</div>
</body>