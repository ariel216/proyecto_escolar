<div class="card">
 <div class="card-content p-3">
    <h3>Estudiantes</h3>
    <form method="post" class="row g-3 mb-4">
      <div class="col-md-3">
        <input type="text" name="carnet" class="form-control" placeholder="Carnet" required>
      </div>
      <div class="col-md-5">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" required>
      </div>
      <div class="col-md-3">
        <input type="text" name="curso" class="form-control" placeholder="Curso (Ej: 1A)" required>
      </div>
      <div class="col-md-1">
        <button class="btn btn-success">Guardar</button>
      </div>
    </form>
    <table class="table table-striped">
      <thead><tr><th>ID</th><th>Carnet</th><th>Nombre</th><th>Curso</th><th>Acciones</th></tr></thead>
      <tbody>
        <?php
        $results = $db->query("SELECT * FROM estudiantes");
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['carnet']}</td>
              <td>{$row['nombre']}</td>
              <td>{$row['curso']}</td>
              <td><a href='index.php?tab=estudiantes&delete={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a></td>
            </tr>";
        }
        ?>
      </tbody>
    </table>
 </div>
</div>


