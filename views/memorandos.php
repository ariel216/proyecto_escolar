<h3>Memorándums</h3>
<form method="post" class="row g-3 mb-4">
  <div class="col-md-4">
    <input type="text" name="titulo" class="form-control" placeholder="Título" required>
  </div>
  <div class="col-md-5">
    <textarea name="descripcion" class="form-control" placeholder="Descripción" required></textarea>
  </div>
  <div class="col-md-2">
    <input type="date" name="fecha" class="form-control" required>
  </div>
  <div class="col-md-1">
    <button class="btn btn-success">Guardar</button>
  </div>
</form>

<table class="table table-striped">
  <thead><tr><th>ID</th><th>Título</th><th>Descripción</th><th>Fecha</th><th>Acciones</th></tr></thead>
  <tbody>
    <?php
    $results = $db->query("SELECT * FROM memorandos");
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['titulo']}</td>
          <td>{$row['descripcion']}</td>
          <td>{$row['fecha']}</td>
          <td><a href='index.php?tab=memorandos&delete={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a></td>
        </tr>";
    }
    ?>
  </tbody>
</table>
