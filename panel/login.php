<?php
session_start();

$db = new SQLite3('database.db');

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    $stmt = $db->prepare("SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1");
    $stmt->bindValue(':usuario', $usuario, SQLITE3_TEXT);
    $result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);

    if ($result && password_verify($password, $result['clave'])) {
        // Guardar sesión
        $_SESSION['id'] = $result['id'];
        $_SESSION['usuario'] = $result['usuario'];

        header("Location: index.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow p-4" style="max-width:400px; width:100%;">
            <h4 class="text-center mb-3">Iniciar Sesión</h4>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <input type="text" name="usuario" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Ingresar</button>
            </form>
        </div>
    </div>
</body>
</html>
