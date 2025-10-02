<?php
$db = new SQLite3('database.db');

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
        // Obtener datos relacionados
        $resumen['asistencias'] = $db->query("SELECT * FROM asistencias ORDER BY fecha DESC LIMIT 5");
        $resumen['tareas']      = $db->query("SELECT * FROM tareas ORDER BY fecha DESC LIMIT 5");
        $resumen['comunicados'] = $db->query("SELECT * FROM comunicados ORDER BY fecha DESC LIMIT 5");
        $resumen['memorandos']  = $db->query("SELECT * FROM memorandos ORDER BY fecha DESC LIMIT 5");
        $resumen['mensualidades'] = $db->query("SELECT * FROM mensualidades ORDER BY fecha DESC LIMIT 5");
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Buscar Estudiante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4 text-center">Buscar Estudiante</h1>

    <!-- Formulario de búsqueda -->
    <div class="card p-4 shadow-sm mb-4">
        <form method="POST">
            <div class="row g-3">
                <div class="col-md-5">
                    <input type="text" name="carnet" class="form-control" placeholder="Carnet" required>
                </div>
                <div class="col-md-5">
                    <input type="text" name="curso" class="form-control" placeholder="Curso (Ej: 1A, 3B)" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <?php if ($estudiante): ?>
            <div class="card shadow-sm p-4 mb-4">
                <h3>📌 Información del Estudiante</h3>
                <p><strong>Carnet:</strong> <?= htmlspecialchars($estudiante['carnet']) ?></p>
                <p><strong>Nombre:</strong> <?= htmlspecialchars($estudiante['nombre']) ?></p>
                <p><strong>Curso:</strong> <?= htmlspecialchars($estudiante['curso']) ?></p>
            </div>

            <!-- Resumen -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white">Asistencias</div>
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
                        <div class="card-header bg-success text-white">Tareas</div>
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
                        <div class="card-header bg-warning">Comunicados</div>
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
                        <div class="card-header bg-danger text-white">Memorandos</div>
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
                <div class="card-header bg-info text-white">Mensualidades</div>
                <ul class="list-group list-group-flush">
                    <?php while ($row = $resumen['mensualidades']->fetchArray(SQLITE3_ASSOC)): ?>
                        <li class="list-group-item">
                            <?= htmlspecialchars($row['mes']) ?> - <?= htmlspecialchars($row['monto']) ?> Bs (<?= htmlspecialchars($row['estado']) ?>)
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>

        <?php else: ?>
            <div class="alert alert-danger">⚠️ No se encontró al estudiante con esos datos.</div>
        <?php endif; ?>
    <?php endif; ?>
</div>
</body>
</html>
