<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

require_once '../includes/conexion.php';

$stmt = $pdo->query("SELECT * FROM mensajes ORDER BY fechaEnvio DESC");
$mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Mensajes - Admin</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
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
            <a href="panelAdmin.php">Inicio Admin</a>
            <a href="gestionProyectos.php">Gestionar Proyectos</a>
            <a href="gestionMensajes.php">Ver Mensajes</a>
            <a href="../logout.php">Cerrar Sesión</a>
        </nav>
    </header>

    <main>
        <section id="seccionGestionMensajes">
            <h2>Mensajes de Contacto Recibidos (<?= count($mensajes) ?>)</h2>
            
            <?php if (count($mensajes) > 0): ?>
                <?php foreach ($mensajes as $mensaje): ?>
                    <div class="tarjetaMensaje">
                        <h4><?= htmlspecialchars($mensaje['nombre']) ?> 
                            <small>(<?= htmlspecialchars($mensaje['email']) ?>)</small>
                        </h4>
                        <p><?= htmlspecialchars($mensaje['mensaje']) ?></p>
                        <small>Enviado: <?= $mensaje['fechaEnvio'] ?></small>
                    </div>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aún no hay mensajes de contacto.</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>© Kevin Daniel González Vargas - 2026</p>
    </footer>
</body>
</html>