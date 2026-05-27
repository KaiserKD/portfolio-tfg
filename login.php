<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['admin'])) {
    header("Location: admin/panelAdmin.php");
    exit;
}

$usuario = isset($usuario) ? $usuario : "";
$errores = isset($errores) ? $errores : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Kevin González</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Panel de Administración</h1>
        <p>Kevin Daniel González Vargas</p>
    </header>

    <main>
        <section id="seccionLogin">
            <h2>Iniciar Sesión</h2>

            <form action="procesarLogin.php" method="post">
                <label for="campoUsuario">Nombre de usuario</label>
                <input type="text" id="campoUsuario" name="usuario" 
                    value="<?= htmlspecialchars($usuario ?? '') ?>">
                <?php if (isset($errores['usuario'])): ?>
                    <span><?= $errores['usuario'] ?></span>
                <?php endif; ?>

                <label for="campoPassword">Contraseña</label>
                <input type="password" id="campoPassword" name="password">
                <?php if (isset($errores['password'])): ?>
                    <span><?= $errores['password'] ?></span>
                <?php endif; ?>

                <?php if (isset($errores['general'])): ?>
                    <p>
                        <?= $errores['general'] ?>
                    </p>
                <?php endif; ?>

                <button type="submit">Entrar al Panel de administrador</button>
                <a href="public/index.php">Volver al Inicio</a>
            </form>
        </section>
    </main>

    <footer>
        <p>© Kevin Daniel González Vargas - 2026</p>
    </footer>
</body>
</html>