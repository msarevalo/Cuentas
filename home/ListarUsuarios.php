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
    <link href="admin.css" type="text/css" rel="stylesheet">
    <script src="admin.js"></script>
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
                    echo "<button type='button' style='padding: 3px 3px 3px 3px; margin: 10px' onclick=\"location.href='../contenido/ActualizarDatos.php'\">Debes actualizar tus datos</button>";
                }else{
                    echo "<lavel style='text-align: justify-all; color: #C6C87A; padding: 10px 10px 10px 50px; text-decoration: none;text-transform: uppercase;'>$ " . number_format($_SESSION['salario'],0,',','.') . "</lavel><br /><br /><br />";
                }
                ?></li></strong>
        <em><?php
            if($_SESSION['sesion'] == "admin"){
                echo "<li><a href=\"CrearUsuario.php\">Crear Usuario</a></li>
            <li><a href=\"EditarUsuario.php\">Editar Usuario</a></li>
            <li><a href=\"EliminarUsuario.php\">Eliminar Usuario</a></li>
            <li><a style=\"background: brown\" href=\"ListarUsuarios.php\">Listar Usuarios</a></li>";
            }
            ?>
            <li><a href="../contenido/ActualizarDatos.php">Actualizar Mis Datos</a></li>
            <li><a href="../contenido/CambiarContraseña.php">Cambiar Contraseña</a></li>
            <li><a onclick="">Mis Movimientos</a></li>
            <li><a onclick="">Simular Movimiento</a></li></em>
            <img style="display: block; cursor: pointer; margin: 15px 0px 0px 60px" src="../imagenes/logout%20(1).png" onclick="location.href='../inicio/cerrar.php'">
    </ul>
</div>

<?php
if ($_SESSION['sesion']=="admin"){
    echo "<div id=\"listado\" name=\"listado\">
    <header>Usuarios</header>";
    $con = mysqli_connect("localhost", "manuel","scout950911", "cuentas");
    $consulta = mysqli_query($con,"SELECT `id_user`, `user`, `name`, `user_type`, `email` FROM `users`");
    /*$lconsulta = mysqli_fetch_array($consulta);
    $long = count($lconsulta);*/
    echo "<table id='usuarios'><thead><tr><th>ID</th><th>Usuario</th><th>Nombre</th><th>Tipo de Cuenta</th><th>Correo</th></tr></thead>";
    while ($lconsulta = mysqli_fetch_array($consulta)){
        echo "<tr>";
        for ($i = 0; $i <= 4; $i++){
            if ($lconsulta[$i] == "admin"){
                echo "<td>Administrador</td>";
            }elseif ($lconsulta[$i]=="user"){
                echo "<td>Usuario Web</td>";
            }else{
                echo "<td>" . $lconsulta[$i] . "</td>";
            }

        }
        echo "</tr>";
    }
    echo "</table>
</div>";
}else{
    echo "<div id=\"bienvenida\" style=\"display: block\">
            <img src=\"../imagenes/bienvenido.png\" width=\"500\">
            </div>";
}
?>

</body>
