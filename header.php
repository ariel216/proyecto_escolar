<?php 
include 'init_db.php';
require 'auth.php';

// Solo usuarios logueados pueden ver esta página
protegerPagina(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administración</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Panel</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="index.php?tab=estudiantes">Estudiantes</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?tab=asistencias">Asistencia</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?tab=tareas">Tareas</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?tab=comunicados">Comunicados</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?tab=memorandos">Memorándums</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?tab=mensualidades">Mensualidades</a></li>
        <li><a href="logout.php" class="btn btn-default">Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-4">
