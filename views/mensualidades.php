<h3>Mensualidades</h3>
<form method="post" class="row g-3 mb-4">
  <div class="col-md-3">
    <input type="text" name="mes" class="form-control" placeholder="Mes (Ej: Enero)" required>
  </div>
  <div class="col-md-2">
    <input type="number" step="0.01" name="monto" class="form-control" placeholder="Monto (Bs.)" required>
  </div>
  <div class="col-md-3">
    <select name="estado" class="form-select" required>
      <option value="">Estado...</option>
      <option value="pendiente">Pendiente</option>
      <option value="pagado">Pagado</option>
      <option value="atrasado">Atrasado</option>
    </select>
  </div>
  <div class="col-md-3">
    <input type="date" name="fecha_pago" class="form-control">
  </div>
  <div class="col-md-1">
    <button class="btn btn-success">Guardar</button>
  </div>
</form>

<table class="table table-striped">
  <thead><tr><th>ID</th><th>Mes</th><th>Monto</th><th>Estado</th><th>Fecha Pago</th><th>Acciones</th></tr></thead>
  <tbody>
    <?php
    $results = $db->query("SELECT * FROM mensualidades");
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['mes']}</td>
          <td>{$row['monto']}</td>
          <td>{$row['estado']}</td>
          <td>{$row['fecha_pago']}</td>
          <td><a href='index.php?tab=mensualidades&delete={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a></td>
        </tr>";
    }
    ?>
  </tbody>
</table>
