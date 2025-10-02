<?php
$db = new SQLite3('database.db');

// Crear tablas si no existen
$db->exec("CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usuario TEXT,
    clave TEXT,
)");

$db->exec("CREATE TABLE IF NOT EXISTS estudiantes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    carnet TEXT,
    nombre TEXT,
    curso TEXT
)");

$db->exec("CREATE TABLE IF NOT EXISTS asistencias (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    materia TEXT,
    fecha TEXT,
    estado TEXT,
    id_estudiante INTEGER
)");

$db->exec("CREATE TABLE IF NOT EXISTS tareas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    materia TEXT,
    titulo TEXT,
    tipo TEXT,
    estado TEXT,
    fecha TEXT,
    id_estudiante INTEGER
)");

$db->exec("CREATE TABLE IF NOT EXISTS comunicados (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT,
    mensaje TEXT,
    fecha TEXT,
    id_estudiante INTEGER
)");

$db->exec("CREATE TABLE IF NOT EXISTS memorandos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT,
    descripcion TEXT,
    fecha TEXT,
    id_estudiante INTEGER
)");

$db->exec("CREATE TABLE IF NOT EXISTS mensualidades (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    mes TEXT,
    monto REAL,
    estado TEXT,
    fecha_pago TEXT,
    id_estudiante INTEGER
)");

$db->exec("CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usuario TEXT UNIQUE,
    clave TEXT,
    nombre TEXT
)");

?>
