<?php
$db = new SQLite3('./panel/base/database.db');

// Si se envió el formulario
$estudiante = null;
$resumen = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $carnet = trim($_POST['carnet']);
    $curso  = trim($_POST['curso']);

    // Buscar estudiante
    $stmt = $db->prepare("SELECT * FROM estudiantes WHERE carnet = :carnet AND curso = :curso LIMIT 1");
    $stmt->bindValue(':carnet', $carnet, SQLITE3_TEXT);
    $stmt->bindValue(':curso', $curso, SQLITE3_TEXT);
    $result = $stmt->execute();
    $estudiante = $result->fetchArray(SQLITE3_ASSOC);

    if ($estudiante) {
        $id_est = $estudiante['id'];

        // Obtener datos relacionados filtrados por estudiante
        $stmt = $db->prepare("SELECT * FROM asistencias WHERE id_estudiante = :id ORDER BY fecha DESC");
        $stmt->bindValue(':id', $id_est, SQLITE3_INTEGER);
        $resumen['asistencias'] = $stmt->execute();

        $stmt = $db->prepare("SELECT * FROM tareas WHERE id_estudiante = :id ORDER BY fecha DESC");
        $stmt->bindValue(':id', $id_est, SQLITE3_INTEGER);
        $resumen['tareas'] = $stmt->execute();

        $stmt = $db->prepare("SELECT * FROM comunicados ORDER BY fecha DESC");       
        $resumen['comunicados'] = $stmt->execute();

        $stmt = $db->prepare("SELECT * FROM memorandos WHERE id_estudiante = :id ORDER BY fecha DESC");
        $stmt->bindValue(':id', $id_est, SQLITE3_INTEGER);
        $resumen['memorandos'] = $stmt->execute();

        $stmt = $db->prepare("SELECT * FROM mensualidades WHERE id_estudiante = :id ORDER BY fecha_pago DESC");
        $stmt->bindValue(':id', $id_est, SQLITE3_INTEGER);
        $resumen['mensualidades'] = $stmt->execute();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Buscar Estudiante</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
<link rel="stylesheet" href="css/estilos.css" />
</head>
<body>
<div class="container py-5">
    <div class="text-center logo mb-3">
        <img src="img/logo.png" alt="Logo" class="rounded-circle"  height="150">
    </div>
     <h1 class="mb-4 text-center text-white">Portal para Padres</h1>
    <!-- Formulario de búsqueda -->
    <div class="card p-4 shadow-sm mb-4">
        <form method="POST">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="carnet" class="form-control" placeholder="Carnet" required>
                </div>
                <div class="col-md-4">
                    <select name="curso" class="form-control" required>
                        <option value="">Seleccione curso</option>
                        <?php
                            $cursos = ["1A","1B","2A","2B","3A","3B","4A","4B","5A","5B","6A","6B"];
                            foreach ($cursos as $c) {
                                echo "<option value='$c'>$c</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="index.php" class="btn btn-secondary">Volver a Inicio</a>
                </div>
            </div>
        </form>
    </div>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <?php if ($estudiante): ?>
            <div class="card shadow-sm p-4 mb-4">
                <h3>Información del Estudiante</h3>
                <p><strong>Carnet:</strong> <?= htmlspecialchars($estudiante['carnet']) ?></p>
                <p><strong>Nombre:</strong> <?= htmlspecialchars($estudiante['nombre']) ?></p>
                <p><strong>Curso:</strong> <?= htmlspecialchars($estudiante['curso']) ?></p>
            </div>

            <!-- Resumen -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header">Asistencias</div>
                        <ul class="list-group list-group-flush">
                            <?php while ($row = $resumen['asistencias']->fetchArray(SQLITE3_ASSOC)): ?>
                                <li class="list-group-item">
                                    <?= htmlspecialchars($row['materia']) ?> - <?= htmlspecialchars($row['fecha']) ?> (<?= htmlspecialchars($row['estado']) ?>)
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header">Tareas</div>
                        <ul class="list-group list-group-flush">
                            <?php while ($row = $resumen['tareas']->fetchArray(SQLITE3_ASSOC)): ?>
                                <li class="list-group-item">
                                    <?= htmlspecialchars($row['materia']) ?> - <?= htmlspecialchars($row['titulo']) ?> (<?= htmlspecialchars($row['estado']) ?>)
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header">Comunicados</div>
                        <ul class="list-group list-group-flush">
                            <?php while ($row = $resumen['comunicados']->fetchArray(SQLITE3_ASSOC)): ?>
                                <li class="list-group-item">
                                    <strong><?= htmlspecialchars($row['titulo']) ?>:</strong> <?= htmlspecialchars($row['mensaje']) ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header">Memorandos</div>
                        <ul class="list-group list-group-flush">
                            <?php while ($row = $resumen['memorandos']->fetchArray(SQLITE3_ASSOC)): ?>
                                <li class="list-group-item">
                                    <strong><?= htmlspecialchars($row['titulo']) ?>:</strong> <?= htmlspecialchars($row['descripcion']) ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header">Mensualidades</div>
                <ul class="list-group list-group-flush">
                    <?php while ($row = $resumen['mensualidades']->fetchArray(SQLITE3_ASSOC)): ?>
                        <li class="list-group-item">
                            <?= htmlspecialchars($row['mes']) ?> - <?= htmlspecialchars($row['monto']) ?> Bs (<?= htmlspecialchars($row['estado']) ?>)
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>

        <?php else: ?>
            <div class="alert alert-danger">No se encontró al estudiante con esos datos.</div>
        <?php endif; ?>
    <?php endif; ?>
</div>
</body>
</html>
