<div class="card">
 <div class="card-content p-3">
    <h3>Estudiantes</h3>
    <form method="post" class="row g-3 mb-4">
      <div class="col-md-2">
        <input type="text" name="carnet" class="form-control" placeholder="Carnet" required>
      </div>
      <div class="col-md-5">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" required>
      </div>
      <div class="col-md-2">
        <input type="text" name="curso" class="form-control" placeholder="Curso (Ej: 1A)" required>
      </div>
      <div class="col-md-2">
        <input type="text" name="telefono" class="form-control" placeholder="71111111" required>
      </div>
      <div class="col-md-1">
        <button class="btn btn-success">Guardar</button>
      </div>
    </form>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Carnet</th>
          <th>Nombre</th>
          <th>Curso</th>
          <th>Teléfono</th>
          <th>Acciones</th>
        </tr>
      </thead>
     <tbody>
        <?php
        $results = $db->query("SELECT * FROM estudiantes");
        $contador = 1;
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>
              <td>{$contador}</td>
              <td>{$row['carnet']}</td>
              <td>{$row['nombre']}</td>
              <td>{$row['curso']}</td>
              <td>{$row['telefono']}</td>
              <td><a href='index.php?tab=estudiantes&delete={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a></td>
            </tr>";
            $contador++;
        }
        ?>
      </tbody>
    </table>
 </div>
</div>


