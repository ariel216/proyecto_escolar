
<div class="card">
 <div class="card-content p-3">
  <h3>Comunicados</h3>
    <form method="post" class="row g-3 mb-4">
      <div class="col-md-3">
        <input type="text" name="titulo" class="form-control" placeholder="Título" required>
      </div>
      <div class="col-md-3">
        <input type="text" name="mensaje" class="form-control" placeholder="Mensaje" required>
      </div>
      <div class="col-md-2">
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
      <div class="col-md-1">
        <button class="btn btn-success w-100">Guardar</button>
      </div>
    </form>

    <table class="table table-striped">
      <thead><tr><th>ID</th><th>Título</th><th>Mensaje</th><th>Fecha</th><th>Estudiante</th><th>Acciones</th></tr></thead>
      <tbody>
        <?php
        $results = $db->query("SELECT c.*, e.nombre, e.carnet, e.curso 
                              FROM comunicados c 
                              LEFT JOIN estudiantes e ON c.id_estudiante = e.id");
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['titulo']}</td>
              <td>{$row['mensaje']}</td>
              <td>{$row['fecha']}</td>
              <td>{$row['carnet']} - {$row['nombre']} ({$row['curso']})</td>
              <td><a href='index.php?tab=comunicados&delete={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a></td>
            </tr>";
        }
        ?>
      </tbody>
    </table>
 </div>
</div>
