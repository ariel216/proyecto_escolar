<h3>Asistencias</h3>
<form method="post" class="row g-3 mb-4">
  <div class="col-md-4">
    <input type="text" name="materia" class="form-control" placeholder="Materia" required>
  </div>
  <div class="col-md-3">
    <input type="date" name="fecha" class="form-control" required>
  </div>
  <div class="col-md-3">
    <select name="estado" class="form-select" required>
      <option value="">Seleccione...</option>
      <option>Asistencia</option>
      <option>Atraso</option>
      <option>Falta</option>
    </select>
  </div>
  <div class="col-md-2">
    <button class="btn btn-success">Guardar</button>
  </div>
</form>

<table class="table table-striped">
  <thead><tr><th>ID</th><th>Materia</th><th>Fecha</th><th>Estado</th><th>Acciones</th></tr></thead>
  <tbody>
    <?php
    $results = $db->query("SELECT * FROM asistencias");
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['materia']}</td>
          <td>{$row['fecha']}</td>
          <td>{$row['estado']}</td>
          <td><a href='index.php?tab=asistencias&delete={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a></td>
        </tr>";
    }
    ?>
  </tbody>
</table>
