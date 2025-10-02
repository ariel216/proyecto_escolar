<?php
session_start();

function protegerPagina($rolesPermitidos = []) {
    if (!isset($_SESSION['id'])) {
        // No logueado → redirigir al login
        header("Location: login.php");
        exit;
    }

    if (!empty($rolesPermitidos) && !in_array($_SESSION['rol'], $rolesPermitidos)) {
        // Rol no permitido → mostrar mensaje o redirigir
        echo "<h3>No tienes permisos para acceder a esta página.</h3>";
        echo "<a href='dashboard.php'>Volver al panel</a>";
        exit;
    }
}
