<?php
session_start();

if (isset($_SESSION['admin'])) {
    header("Location: admin/panelAdmin.php");
    exit;
}
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
                <label for="campoUsuario">Usuario</label>
                <input type="text" id="campoUsuario" name="usuario" required>
                
                <label for="campoPassword">Contraseña</label>
                <input type="password" id="campoPassword" name="password" required>
                
                <button type="submit">Entrar al Panel</button>
            </form>
        </section>
    </main>

    <footer>
        <p>© Kevin Daniel González Vargas - 2026</p>
    </footer>
</body>
</html>