<?php

session_start();

//echo "Hola " . $_SESSION['usuario'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
    echo "<title>Cuentas de " . $_SESSION['usuario'] . "</title>";
    ?>
</head>
<body>
<?php
echo "<label>Su salario actual es:  &nbsp; &nbsp;$ " . number_format($_SESSION['salario'],0,',',' . ') . "  pesos</label>";
//echo "<br /><button><a href='../inicio/cerrar.php'>Cerrar Sesion</a></button>"
?>
</body>