<?php
// includes/auth.php
session_start();

// Si no existe la variable de sesión 'usuario', no está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}
?>