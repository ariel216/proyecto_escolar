<h3>Tareas / Prácticas</h3>
<form method="post" class="row g-3 mb-4">
  <div class="col-md-3">
    <input type="text" name="materia" class="form-control" placeholder="Materia" required>
  </div>
  <div class="col-md-3">
    <input type="text" name="titulo" class="form-control" placeholder="Título" required>
  </div>
  <div class="col-md-2">
    <select name="tipo" class="form-select" required>
      <option value="">Tipo...</option>
      <option value="tarea">Tarea</option>
      <option value="practica">Práctica</option>
    </select>
  </div>
  <div class="col-md-2">
    <select name="estado" class="form-select" required>
      <option value="">Estado...</option>
      <option value="pendiente">Pendiente</option>
      <option value="entregado">Entregado</option>
      <option value="atrasado">Atrasado</option>
    </select>
  </div>
  <div class="col-md-2">
    <input type="date" name="fecha" class="form-control" required>
  </div>
  <div class="col-12">
    <button class="btn btn-success">Guardar</button>
  </div>
</form>

<table class="table table-striped">
  <thead><tr><th>ID</th><th>Materia</th><th>Título</th><th>Tipo</th><th>Estado</th><th>Fecha</th><th>Acciones</th></tr></thead>
  <tbody>
    <?php
    $results = $db->query("SELECT * FROM tareas");
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['materia']}</td>
          <td>{$row['titulo']}</td>
          <td>{$row['tipo']}</td>
          <td>{$row['estado']}</td>
          <td>{$row['fecha']}</td>
          <td><a href='index.php?tab=tareas&delete={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a></td>
        </tr>";
    }
    ?>
  </tbody>
</table>
