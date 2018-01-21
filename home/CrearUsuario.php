<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 16/01/2018
 * Time: 10:35 PM
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
        <strong>
            <br /><a href="home.php" style="cursor: pointer"><li><?php echo "<label style='color: #ccc; padding: 10px 10px 10px 50px; text-decoration: none;text-transform: uppercase;'>Usuario:</label>"?></li></a>
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
                echo "<li><a style='background: brown' href=\"CrearUsuario.php\">Crear Usuario</a></li>
                        <li><a href=\"EditarUsuario.php\">Editar Usuario</a></li>
                        <li><a href=\"EliminarUsuario.php\">Eliminar Usuario</a></li>
                        <li><a href=\"ListarUsuarios.php\">Listar Usuarios</a></li>";
            }
            ?>
            <li><a href="../contenido/ActualizarDatos.php">Actualizar Mis Datos</a></li>
            <li><a onclick="">Mis Movimientos</a></li>
            <li><a onclick="">Simular Movimiento</a></li></em>
    </ul>
</div>

<?php
if ($_SESSION['sesion']=="admin"){
  echo "<div id=\"crear\" name=\"crear\">
    <header>Crear Usuario:</header>
    <form method=\"post\" action=\"crear.php\" autocomplete=\"off\">
        <table>
            <tr>
                <td>
                    <label>Usuario:</label>
                </td>
                <td>
                    <input type=\"text\" id=\"newuser\" name=\"newuser\" placeholder=\"Usuario\" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Contraseña</label>
                </td>
                <td>
                    <input type=\"text\" id=\"newpass\" name=\"newpass\" placeholder=\"Contraseña\" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Confirmar Contraseña</label>
                </td>
                <td>
                    <input type=\"text\" id=\"conpass\" name=\"conpass\" placeholder=\"Contfirmar Contraseña\" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nombres</label>
                </td>
                <td>
                    <input type=\"text\" id=\"name\" name=\"name\" placeholder=\"Nombres Usuario\" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Salario</label>
                </td>
                <td>
                    <input type=\"number\" id=\"salario\" name=\"salario\" placeholder=\"Salario\">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Perfil</label>
                </td>
                <td>
                    <select id=\"cuenta\" name=\"cuenta\">
                        <option value=\"admin\">Administrador</option>
                        <option value=\"user\" selected=\"selected\">Usuario Web</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Correo</label>
                </td>
                <td>
                    <input type=\"email\" id=\"correo\" name=\"correo\" placeholder=\"Correo\" required>
                </td>
            </tr>
        </table>
        <center><input type=\"submit\" value=\"Crear Usuario\"></center>
    </form>
</div>";
}else{
    echo "<div id=\"bienvenida\" style=\"display: block\">
            <img src=\"../imagenes/bienvenido.png\" width=\"500\">
            </div>";
}
?>
</body>
