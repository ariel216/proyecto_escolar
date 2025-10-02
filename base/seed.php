<?php
require 'init_db.php';

// Insertar un estudiante
$db->exec("INSERT INTO estudiantes (carnet, nombre, curso) 
           VALUES ('2025A001', 'Juan Pérez', '1A')");

// Insertar una asistencia
$db->exec("INSERT INTO asistencias (materia, fecha, estado) 
           VALUES ('Matemáticas', '2025-10-02', 'Asistencia')");

// Insertar una tarea
$db->exec("INSERT INTO tareas (materia, titulo, tipo, estado, fecha) 
           VALUES ('Lenguaje', 'Ensayo sobre Cervantes', 'Tarea', 'Pendiente', '2025-10-05')");

// Insertar un comunicado
$db->exec("INSERT INTO comunicados (titulo, mensaje, fecha) 
           VALUES ('Reunión de padres', 'La reunión será el viernes a las 18:00', '2025-10-03')");

// Insertar un memorando
$db->exec("INSERT INTO memorandos (titulo, descripcion, fecha) 
           VALUES ('Cambio de horario', 'El horario de clases de Física cambia a las 9:00', '2025-10-04')");

// Insertar una mensualidad
$db->exec("INSERT INTO mensualidades (mes, monto, estado, fecha_pago) 
           VALUES ('Octubre', 300.50, 'Pagado', '2025-10-01')");

$check = $db->querySingle("SELECT COUNT(*) as count FROM usuarios");
if ($check == 0) {
    $password_admin = password_hash('admin123', PASSWORD_DEFAULT);
    $password_docente = password_hash('docente123', PASSWORD_DEFAULT);

    $db->exec("INSERT INTO usuarios (usuario, clave, nombre) VALUES 
        ('admin', '$password_admin', 'Administrador del Sistema'),
        ('profesor', '$password_docente', 'Profesor de Ejemplo')
    ");
}

echo "✅ Datos de prueba insertados correctamente\n";
?>