<div class="card">
 <div class="card-content p-3">
    <h3>Mensualidades</h3>
    <form method="post" class="row g-3 mb-4">
      <div class="col-md-2">
        <input type="text" name="mes" class="form-control" placeholder="Mes (Ej: Enero)" required>
      </div>
      <div class="col-md-2">
        <input type="number" step="0.01" name="monto" class="form-control" placeholder="Monto" required>
      </div>
      <div class="col-md-2">
        <select name="estado" class="form-select" required>
          <option value="">Estado...</option>
          <option>Pendiente</option>
          <option>Pagado</option>
          <option>Atrasado</option>
        </select>
      </div>
      <div class="col-md-2">
        <input type="date" name="fecha_pago" class="form-control">
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
      <thead><tr><th>ID</th><th>Mes</th><th>Monto</th><th>Estado</th><th>Fecha Pago</th><th>Estudiante</th><th>Acciones</th></tr></thead>
      <tbody>
        <?php
        $results = $db->query("SELECT ms.*, e.nombre, e.carnet, e.curso 
                              FROM mensualidades ms 
                              LEFT JOIN estudiantes e ON ms.id_estudiante = e.id");
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['mes']}</td>
              <td>{$row['monto']}</td>
              <td>{$row['estado']}</td>
              <td>{$row['fecha_pago']}</td>
              <td>{$row['carnet']} - {$row['nombre']} ({$row['curso']})</td>
              <td><a href='index.php?tab=mensualidades&delete={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a></td>
            </tr>";
        }
        ?>
      </tbody>
    </table>
 </div>
</div>
