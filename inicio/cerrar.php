<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 14/01/2018
 * Time: 1:58 PM
 */
session_start();
session_destroy();
header("Location: index.php");
?>