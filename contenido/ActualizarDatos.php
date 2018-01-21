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
        <strong>
            <br /><li><?php echo "<label style='color: #ccc; padding: 10px 10px 10px 50px; text-decoration: none;text-transform: uppercase;'>Usuario:</label>"?></li>
            <li><?php echo "<label style='display: block; text-align: justify-all; padding: 10px 10px 10px 50px; color: #C6C87A; text-decoration: none;text-transform: uppercase;'>" . $_SESSION['usuario'] . "</label>"?></li>
            <li><?php echo "<lavel style='color: #ccc; padding: 10px 10px 10px 30px; text-decoration: none;text-transform: uppercase;'>Salario Base:</lavel>" ?></li>
            <li><?php
                if ($_SESSION['salario']==null || $_SESSION['salario']==0){
                    echo "<button type='button' style='padding: 3px 3px 3px 3px; margin: 10px'>Debes actualizar tus datos</button>";
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
            <li><a onclick="">Mis Movimientos</a></li>
            <li><a onclick="">Simular Movimiento</a></li></em>
    </ul>
</div>
</body>