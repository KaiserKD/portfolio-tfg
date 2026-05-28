<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Kevin González</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1 style="margin-top: 30px">Panel de Administración</h1>
        <p>Bienvenido, Kevin</p>
        <input type="checkbox" id="activadorMenu">
        <label for="activadorMenu" id="botonDesplegable">
            <span class="barraIcono"></span>
            <span class="barraIcono"></span>
            <span class="barraIcono"></span>
        </label>
        <nav id="menuNavegacion">
            <a href="panelAdmin.php">Inicio Admin</a>
            <a href="gestionProyectos.php">Gestionar Proyectos</a>
            <a href="gestionMensajes.php">Ver Mensajes</a>
            <a href="../logout.php">Cerrar Sesión</a>
        </nav>
    </header>

    <main>
        <section id="seccionPanelAdmin">
            <h2>Bienvenido al Panel</h2>
            <p>Desde aquí puedes gestionar tus proyectos y ver los mensajes de contacto.</p>
        </section>
    </main>

    <footer>
        <p>© Kevin Daniel González Vargas - 2026</p>
    </footer>
</body>
</html>