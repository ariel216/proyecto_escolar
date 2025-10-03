<div class="card">
 <div class="card-content p-3">
  <h3>Asistencias</h3>
    <form method="post" class="row g-3 mb-4">
      <div class="col-md-3">
        <input type="text" name="materia" class="form-control" placeholder="Materia" required>
      </div>
      <div class="col-md-2">
        <input type="date" name="fecha" class="form-control" required>
      </div>
      <div class="col-md-2">
        <select name="estado" class="form-select" required>
          <option value="">Seleccione...</option>
          <option>Asistencia</option>
          <option>Atraso</option>
          <option>Falta</option>
        </select>
      </div>
      <div class="col-md-3">
        <select name="id_estudiante" class="form-select" required>
          <option value="">-- Seleccionar estudiante --</option>
          <?php
          $estudiantes = $db->query("SELECT id, carnet, nombre, curso FROM estudiantes");
          while ($e = $estudiantes->fetchArray(SQLITE3_ASSOC)) {
              echo "<option value='{$e['id']}'>{$e['carnet']} - {$e['nombre']} ({$e['curso']})</option>";
          }
          ?>
        </select>
      </div>
      <div class="col-md-2">
        <button class="btn btn-success w-100">Guardar</button>
      </div>
    </form>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Materia</th>
          <th>Fecha</th>
          <th>Estado</th>
          <th>Estudiante</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $results = $db->query("SELECT a.*, e.nombre, e.carnet, e.curso 
                              FROM asistencias a 
                              LEFT JOIN estudiantes e ON a.id_estudiante = e.id");
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['materia']}</td>
              <td>{$row['fecha']}</td>
              <td>{$row['estado']}</td>
              <td>{$row['carnet']} - {$row['nombre']} ({$row['curso']})</td>
              <td><a href='index.php?tab=asistencias&delete={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a></td>
            </tr>";
        }
        ?>
      </tbody>
    </table>
 </div>
</div>
