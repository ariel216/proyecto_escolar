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
        <select name="curso" class="form-control" required>
          <option value="">Seleccione curso</option>
          <?php
            $cursos = ["1A","1B","2A","2B","3A","3B","4A","4B","5A","5B","6A","6B"];
            foreach ($cursos as $c) {
                echo "<option value='$c'>$c</option>";
            }
          ?>
        </select>
      </div>
      <div class="col-md-2">
        <input type="text" name="telefono" class="form-control" placeholder="71111111" required>
      </div>
      <div class="col-md-1">
        <button class="btn btn-success">Guardar</button>
      </div>
    </form>

    <form method="get" class="row g-3 mb-3">
      <input type="hidden" name="tab" value="estudiantes">
      <div class="col-md-3">
        <label>Curso:</label>
        <select name="filtro_curso" class="form-control" onchange="this.form.submit()">
          <option value="">-- Todos los cursos --</option>
          <?php
            $cursos = ["1A","1B","2A","2B","3A","3B","4A","4B","5A","5B","6A","6B"];
            foreach ($cursos as $c) {
                $selected = (isset($_GET['filtro_curso']) && $_GET['filtro_curso'] == $c) ? "selected" : "";
                echo "<option value='$c' $selected>$c</option>";
            }
          ?>
        </select>
      </div>
    </form>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Carnet</th>
          <th>Nombre</th>
          <th>Curso</th>
          <th>Teléfono</th>
          <th>Acciones</th>
        </tr>
      </thead>
     <tbody>
        <?php
        $contador = 1;
        $query = "SELECT * FROM estudiantes";
        if (!empty($_GET['filtro_curso'])) {
            $curso = $_GET['filtro_curso'];
            $stmt = $db->prepare("SELECT * FROM estudiantes WHERE curso = :curso");
            $stmt->bindValue(':curso', $curso, SQLITE3_TEXT);
            $results = $stmt->execute();
        } else {
            $results = $db->query($query);
        }

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
