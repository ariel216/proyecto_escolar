<?php
$db = new SQLite3('database.db');

// Insertar estudiantes
$estudiantes = [
    ["ANCALLE", "RIOS", "MARIANA MAITE", "73801454"],
    ["AQUINO", "CONTRERAS", "NEYMAR SAUL", "68283147"],
    ["AUCA", "LEQUE", "DARLEN GABRIELA", "72327368"],
    ["BLANCO", "GARCIA", "DANIA NICOLE", "68351654"],
    ["CANAVIRI", "AUCACHI", "INDIRA JAZMIN", "70430708"],
    ["CHAMBI", "ESPINOZA", "BELEN JAZMIN", "72464759"],
    ["CHINO", "ALIAGA", "EDDY KEVIN", "71276906"],
    ["CHOQUE", "MAGNE", "JOSE MARCELO", "72468584"],
    ["CHUGAR", "JUANEZ", "ROBERT DAVID", "62841143"],
    ["CHURATA", "MENDIETA", "ALAN JHOEL", "72487882"],
    ["COCA", "ARELLANO", "FABRICIO ALEJANDRO", "71882852"],
    ["CONDORI", "BERRIOS", "VALERIA LINNET", "72379705"],
    ["ESCOBAR", "MAMANI", "BRAYAN", "69588632"],
    ["FUENTES", "MERIDA", "SEBASTIAN", "52-55779"],
    ["GARCIA", "FIGUEREDO", "MARIOLY BRISEYCA", "73823279"],
    ["GUTIERREZ", "ARAMAYO", "GABRIEL ORLANDO", "72472271"],
    ["HUACARA", "FUENTES", "LUIS FERNANDO", "72453837"],
    ["JIMENEZ", "CARRASCO", "SEBASTIAN", "79415670"],
    ["LLANQUE", "CONDORI", "SHARON STHEPHANIE", "68303052"],
    ["MAMANI", "CHAVEZ", "ANA BELEN", "74118676"],
    ["MAMANI", "PINTO", "BRAYAN JOSUE", "72461165"],
    ["MORALES", "TAQUIMALLCO", "MARIA BELEN", "76154654"],
    ["OLMOS", "CARVAJAL", "JORGE ALEXANDER", "74467531"],
    ["PACHECO", "GONZALES", "GABRIELA ISABEL", "67213286"],
    ["PASCUAL", "VARGAS", "TATIANA FELICIDAD", "79414145"],
    ["PEÑA", "MALLCU", "IAN MARCELO", "73843855"],
    ["QUELCA", "FLORES", "JIMENA", "67254532"],
    ["QUISPE", "MAMANI", "ANDREA BELEN", "72301110"],
    ["SOLIZ", "NIÑO DE GUZMÁN", "MAITE CIELO", "75715512"],
    ["SORIA", "SOSA", "GROVER GABRIEL", "72354250"],
    ["VELEZ", "MALLCU", "JOSÉ ARTURO", "73829048"],
    ["VILLANUEVA", "CHOQUE", "ISABEL", "74007437"],
    ["ZENTENO", "LEDEZMA", "ABRIL ANDREA", "72497571"]
];

// Preparar sentencia
$stmt = $db->prepare("INSERT INTO estudiantes (carnet, nombre, curso, telefono) VALUES (:carnet, :nombre, :curso, :telefono)");

$curso = "6B";

foreach ($estudiantes as $e) {
    $nombreCompleto = $e[0] . " " . $e[1] . " " . $e[2];
    $telefono = $e[3];
    // Generar carnet aleatorio de 8 cifras que empiece con 1
    $carnet = strval(random_int(10000000, 19999999));

    $stmt->bindValue(':carnet', $carnet, SQLITE3_TEXT);
    $stmt->bindValue(':nombre', $nombreCompleto, SQLITE3_TEXT);
    $stmt->bindValue(':curso', $curso, SQLITE3_TEXT);
    $stmt->bindValue(':telefono', $telefono, SQLITE3_TEXT);
    $stmt->execute();
}

echo "Registros insertados correctamente.";
?>
