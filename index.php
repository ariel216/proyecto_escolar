<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Colegio San Ignacio de Loyola</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
  </head>
  <body class="text-white text-center">
    <div class="container py-5">
      <div class="logo mb-3">
        <img src="img/logo.png" alt="Logo" class="rounded-circle"  height="150">
      </div>
      <h1>Colegio San Ignacio de Loyola</h1>
      <p class="fst-italic">En todo amar y servir</p>
      <h3 class="mt-4">Plataforma Educativa</h3>

      <div class="row justify-content-center mt-4">
        <div class="col-md-4">
          <div class="card p-3 shadow">
            <h5>Portal para Padres</h5>
            <p>Consulte información académica y administrativa de su hijo</p>
            <ul class="text-start">
              <li>Asistencia y atrasos</li>
              <li>Tareas y prácticas</li>
              <li>Comunicados y memorándums</li>
              <li>Estado de mensualidades</li>
            </ul>
            <a href="portal_padres.php" class="btn btn-primary">Ingresar</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-3 shadow">
            <h5>Panel de Administración</h5>
            <p>Gestione estudiantes y registre información académica</p>
            <ul class="text-start">
              <li>Registro de estudiantes</li>
              <li>Control de asistencia</li>
              <li>Gestión de tareas</li>
              <li>Administración de pagos</li>
            </ul>
            <a href="panel/index.php" class="btn btn-danger">Ingresar</a>
          </div>
        </div>
      </div>

      <div class="alert alert-primary mt-4 text-start">
        <b>Información Importante:</b>
        <ul>
          <li>
            Los padres de familia pueden consultar información usando el carnet
            y curso del estudiante
          </li>
          <li>
            El personal docente y administrativo gestiona todo desde el panel de
            administración
          </li>
          <li>La información se almacena de forma segura y en tiempo real</li>
        </ul>
      </div>

      <footer class="mt-4 small">
        Colegio San Ignacio de Loyola - Sistema de Gestión Educativa
      </footer>
    </div>
  </body>
</html>