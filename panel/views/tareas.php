<div class="card">
 <div class="card-content p-3">
    <h3>Tareas</h3>
    <form method="post" class="row g-3 mb-4">
      <div class="col-md-3">
        <input type="text" name="materia" class="form-control" placeholder="Materia" required>
      </div>
      <div class="col-md-3">
        <input type="text" name="titulo" class="form-control" placeholder="Título" required>
      </div>
      <div class="col-md-3">
        <select name="tipo" class="form-select" required>
          <option value="">Tipo...</option>
          <option>Tarea</option>
          <option>Práctica</option>
        </select>
      </div>
      <div class="col-md-3">
        <select name="estado" class="form-select" required>
          <option value="">Estado...</option>
          <option>Pendiente</option>
          <option>Entregado</option>
          <option>Atrasado</option>
        </select>
      </div>
      <div class="col-md-3">
        <input type="date" name="fecha" class="form-control" required>
      </div>
      <div class="col-md-3">
        <select name="id_estudiante" class="form-select" required>
          <option value="">-- Estudiante --</option>
          <?php
          $estudiantes = $db->query("SELECT id, carnet, nombre, curso FROM estudiantes");
          while ($e = $estudiantes->fetchArray(SQLITE3_ASSOC)) {
              echo "<option value='{$e['id']}'>{$e['carnet']} - {$e['nombre']} ({$e['curso']})</option>";
          }
          ?>
        </select>
      </div>
      <div class="col-md-3">
        <button class="btn btn-success">Guardar</button>
      </div>
    </form>

    <table class="table table-striped">
      <thead><tr>
        <th>ID</th><th>Materia</th><th>Título</th><th>Tipo</th><th>Estado</th><th>Fecha</th><th>Estudiante</th><th>Acciones</th>
      </tr></thead>
      <tbody>
        <?php
        $results = $db->query("SELECT t.*, e.nombre, e.carnet, e.curso 
                              FROM tareas t 
                              LEFT JOIN estudiantes e ON t.id_estudiante = e.id");
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['materia']}</td>
              <td>{$row['titulo']}</td>
              <td>{$row['tipo']}</td>
              <td>{$row['estado']}</td>
              <td>{$row['fecha']}</td>
              <td>{$row['carnet']} - {$row['nombre']} ({$row['curso']})</td>
              <td><a href='index.php?tab=tareas&delete={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a></td>
            </tr>";
        }
        ?>
      </tbody>
    </table>
 </div>
</div>
