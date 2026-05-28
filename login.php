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
        <h1 style="margin-top: 30px">Panel de Administración</h1>
        <input type="checkbox" id="activadorMenu">
        <label for="activadorMenu" id="botonDesplegable">
            <span class="barraIcono"></span>
            <span class="barraIcono"></span>
            <span class="barraIcono"></span>
        </label>
        <nav id="menuNavegacion">
            <a href="index.php">Inicio</a>
            <a href="proyectos.php">Proyectos</a>
            <a href="contacto.php">Contacto</a>
            <a href="../login.php">Admin</a>
        </nav>
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
            </form>
        </section>
    </main>

    <footer>
        <p>© Kevin Daniel González Vargas - 2026</p>
    </footer>
</body>
</html>