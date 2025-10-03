<?php 
require 'auth.php';
protegerPagina(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administración</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/estilos.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Panel de Administración</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarOpciones" aria-controls="navbarOpciones" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarOpciones">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php?tab=estudiantes">Estudiantes</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?tab=asistencias">Asistencia</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?tab=tareas">Tareas</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?tab=comunicados">Comunicados</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?tab=memorandos">Memorándums</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?tab=mensualidades">Mensualidades</a></li>
      </ul>
      <a href="logout.php" class="btn btn-light">Cerrar Sesión</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <div class="text-center logo mb-3">
    <img src="../img/logo.png" alt="Logo" class="rounded-circle" height="150">
  </div>
