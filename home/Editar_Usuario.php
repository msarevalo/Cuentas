<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 20/01/2018
 * Time: 3:32 PM
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
            <br /><li><?php echo "<label style='color: #ccc; padding: 10px 10px 10px 50px; text-decoration: none;text-transform: uppercase;'>Usuario:</label>"?></li>
            <li><?php echo "<label style='display: block; text-align: justify-all; padding: 10px 10px 10px 50px; color: #C6C87A; text-decoration: none;text-transform: uppercase;'>" . $_SESSION['usuario'] . "</label>"?></li>
            <li><?php echo "<lavel style='color: #ccc; padding: 10px 10px 10px 30px; text-decoration: none;text-transform: uppercase;'>Salario Base:</lavel>" ?></li>
            <li><?php
                if ($_SESSION['salario']==null){
                    echo "<button type='button' style='padding: 3px 3px 3px 3px; margin: 10px'>Debes actualizar tus datos</button>";
                }else{
                    echo "<lavel style='text-align: justify-all; color: #C6C87A; padding: 10px 10px 10px 50px; text-decoration: none;text-transform: uppercase;'>$ " . number_format($_SESSION['salario'],0,',','.') . "</lavel><br /><br /><br />";
                }
                ?></li></strong>
        <em><li><a href="CrearUsuario.php">Crear Usuario</a></li>
            <li><a style="background: brown" href="EditarUsuario.php">Editar Usuario</a></li>
            <li><a href="EliminarUsuario.php">Eliminar Usuario</a></li>
            <li><a onclick="">Listar Usuarios</a></li>
            <li><a onclick="">Actualizar Mis Datos</a></li>
            <li><a onclick="">Mis Movimientos</a></li>
            <li><a onclick="">Simular Movimiento</a></li></em>
    </ul>
</div>
<div id="Edicion" name="Edicion">
    <header><?php echo "Editar usuario: " . $_SESSION['con_user']?></header>
    <form method="post" action="editar.php" autocomplete="off">
        <table>
            <tr>
                <td>
                    <label>Nombres</label>
                </td>
                <td>
                    <?php echo "<input type='text' id='name' name='name' placeholder='Nombres Usuario' required value='" . $_SESSION['con_name'] . "'>"?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Salario</label>
                </td>
                <td>
                    <?php echo "<input type='number' id='salario' name='salario' placeholder='Salario' value='" . $_SESSION['con_sal'] . "'>"?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Perfil</label>
                </td>
                <td>
                    <?php
                        if ($_SESSION['con_perf'] == "admin"){
                            echo "<select id='cuenta' name='cuenta'>
                                    <option value='admin' selected='selected'>Administrador</option>
                                    <option value='user'>Usuario Web</option>
                                  </select>";
                        }else{
                            echo "<select id='cuenta' name='cuenta'>
                                    <option value='admin'>Administrador</option>
                                    <option value='user' selected='selected'>Usuario Web</option>
                                  </select>";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Correo</label>
                </td>
                <td>
                    <?php echo "<input type='email' id='correo' name='correo' placeholder='Correo' value='" . $_SESSION['con_mail'] . "'>"?>
                </td>
            </tr>
        </table>
        <center><input type="submit" value="Editar Usuario"></center>
    </form>
</div>
</body>
