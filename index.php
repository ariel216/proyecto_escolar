<?php include 'header.php';

$tab = $_GET['tab'] ?? 'estudiantes';
$db = new SQLite3('database.db');

// --- Insertar registro ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($tab) {
        case 'estudiantes':
            $stmt = $db->prepare("INSERT INTO estudiantes (carnet, nombre, curso) VALUES (:c, :n, :cu)");
            $stmt->bindValue(':c', $_POST['carnet']);
            $stmt->bindValue(':n', $_POST['nombre']);
            $stmt->bindValue(':cu', $_POST['curso']);
            $stmt->execute();
            break;
        case 'asistencias':
            $stmt = $db->prepare("INSERT INTO asistencias (materia, fecha, estado) VALUES (:m, :f, :e)");
            $stmt->bindValue(':m', $_POST['materia']);
            $stmt->bindValue(':f', $_POST['fecha']);
            $stmt->bindValue(':e', $_POST['estado']);
            $stmt->execute();
            break;
        case 'tareas':
            $stmt = $db->prepare("INSERT INTO tareas (materia, titulo, tipo, estado, fecha) VALUES (:m,:t,:ti,:e,:f)");
            $stmt->bindValue(':m', $_POST['materia']);
            $stmt->bindValue(':t', $_POST['titulo']);
            $stmt->bindValue(':ti', $_POST['tipo']);
            $stmt->bindValue(':e', $_POST['estado']);
            $stmt->bindValue(':f', $_POST['fecha']);
            $stmt->execute();
            break;
        case 'comunicados':
            $stmt = $db->prepare("INSERT INTO comunicados (titulo, mensaje, fecha) VALUES (:t,:msj,:f)");
            $stmt->bindValue(':t', $_POST['titulo']);
            $stmt->bindValue(':msj', $_POST['mensaje']);
            $stmt->bindValue(':f', $_POST['fecha']);
            $stmt->execute();
            break;
        case 'memorandos':
            $stmt = $db->prepare("INSERT INTO memorandos (titulo, descripcion, fecha) VALUES (:t,:d,:f)");
            $stmt->bindValue(':t', $_POST['titulo']);
            $stmt->bindValue(':d', $_POST['descripcion']);
            $stmt->bindValue(':f', $_POST['fecha']);
            $stmt->execute();
            break;
        case 'mensualidades':
            $stmt = $db->prepare("INSERT INTO mensualidades (mes, monto, estado, fecha_pago) VALUES (:m,:mo,:e,:f)");
            $stmt->bindValue(':m', $_POST['mes']);
            $stmt->bindValue(':mo', $_POST['monto']);
            $stmt->bindValue(':e', $_POST['estado']);
            $stmt->bindValue(':f', $_POST['fecha_pago']);
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
include "views/$tab.php";

include 'footer.php';
