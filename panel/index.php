<?php
include 'header.php';

$tab = $_GET['tab'] ?? 'estudiantes';
$db = new SQLite3('./base/database.db');

// --- Insertar registro ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($tab) {
        case 'estudiantes':
            $stmt = $db->prepare("INSERT INTO estudiantes (carnet, nombre, curso, telefono) 
                                  VALUES (:c, :n, :cu, :t)");
            $stmt->bindValue(':c', $_POST['carnet']);
            $stmt->bindValue(':n', $_POST['nombre']);
            $stmt->bindValue(':cu', $_POST['curso']);
            $stmt->bindValue(':t', $_POST['telefono']);
            $stmt->execute();
            break;

        case 'asistencias':
            $stmt = $db->prepare("INSERT INTO asistencias (materia, fecha, estado, id_estudiante) 
                                  VALUES (:m, :f, :e, :id)");
            $stmt->bindValue(':m', $_POST['materia']);
            $stmt->bindValue(':f', $_POST['fecha']);
            $stmt->bindValue(':e', $_POST['estado']);
            $stmt->bindValue(':id', $_POST['id_estudiante']);
            $stmt->execute();
            break;

        case 'tareas':
            $stmt = $db->prepare("INSERT INTO tareas (materia, titulo, tipo, estado, fecha, id_estudiante) 
                                  VALUES (:m, :t, :ti, :e, :f, :id)");
            $stmt->bindValue(':m', $_POST['materia']);
            $stmt->bindValue(':t', $_POST['titulo']);
            $stmt->bindValue(':ti', $_POST['tipo']);
            $stmt->bindValue(':e', $_POST['estado']);
            $stmt->bindValue(':f', $_POST['fecha']);
            $stmt->bindValue(':id', $_POST['id_estudiante']);
            $stmt->execute();
            break;

        case 'comunicados':
            $stmt = $db->prepare("INSERT INTO comunicados (titulo, mensaje, fecha) 
                                  VALUES (:t, :msj, :f, :id)");
            $stmt->bindValue(':t', $_POST['titulo']);
            $stmt->bindValue(':msj', $_POST['mensaje']);
            $stmt->bindValue(':f', $_POST['fecha']);
            $stmt->execute();
            break;

        case 'memorandos':
            $stmt = $db->prepare("INSERT INTO memorandos (titulo, descripcion, fecha, id_estudiante) 
                                  VALUES (:t, :d, :f, :id)");
            $stmt->bindValue(':t', $_POST['titulo']);
            $stmt->bindValue(':d', $_POST['descripcion']);
            $stmt->bindValue(':f', $_POST['fecha']);
            $stmt->bindValue(':id', $_POST['id_estudiante']);
            $stmt->execute();
            break;

        case 'mensualidades':
            $stmt = $db->prepare("INSERT INTO mensualidades (mes, monto, estado, fecha_pago, id_estudiante) 
                                  VALUES (:m, :mo, :e, :f, :id)");
            $stmt->bindValue(':m', $_POST['mes']);
            $stmt->bindValue(':mo', $_POST['monto']);
            $stmt->bindValue(':e', $_POST['estado']);
            $stmt->bindValue(':f', $_POST['fecha_pago']);
            $stmt->bindValue(':id', $_POST['id_estudiante']);
            $stmt->execute();
            break;
    }
}

// --- Eliminar registro ---
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $db->exec("DELETE FROM $tab WHERE id=$id");
}

// --- Mostrar formulario y registros ---
include "vistas/$tab.php";

include 'footer.php';
?>
