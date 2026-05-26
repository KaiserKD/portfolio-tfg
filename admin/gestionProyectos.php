<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

require_once '../includes/conexion.php';

$stmt = $pdo->query("SELECT * FROM proyectos ORDER BY fechaCreacion DESC");
$proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proyectos - Admin</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Panel de Administración</h1>
        <nav>
            <a href="panelAdmin.php">Inicio</a>
            <a href="gestionProyectos.php">Proyectos</a>
            <a href="gestionMensajes.php">Mensajes</a>
            <a href="../logout.php">Cerrar Sesión</a>
        </nav>
    </header>

    <main>
        <section id="seccionGestionProyectos">
            <h2>Gestionar Proyectos</h2>
            
            <h3>Añadir Nuevo Proyecto</h3>
            <form action="procesarProyecto.php" method="post">
                <label for="campoTitulo">Título</label>
                <input type="text" id="campoTitulo" name="titulo" required>
                
                <label for="campoDescripcion">Descripción</label>
                <textarea id="campoDescripcion" name="descripcion" rows="4" required></textarea>
                
                <label for="campoTecnologias">Tecnologías</label>
                <input type="text" id="campoTecnologias" name="tecnologias" placeholder="HTML5, CSS3, PHP..." required>
                
                <button type="submit" name="accion" value="crear">Añadir Proyecto</button>
            </form>

            <hr>
            <h3>Proyectos Existentes (<?= count($proyectos) ?>)</h3>
            
            <?php if (count($proyectos) > 0): ?>
                <?php foreach ($proyectos as $proyecto): ?>
                    <article class="tarjetaProyecto">
                        <h4><?= htmlspecialchars($proyecto['titulo']) ?></h4>
                        <p><?= htmlspecialchars($proyecto['descripcion']) ?></p>
                        <p><b>Tecnologías:</b> <?= htmlspecialchars($proyecto['tecnologias']) ?></p>
                        <p>Fecha: <?= $proyecto['fechaCreacion'] ?></p>
                        
                        <form action="procesarProyecto.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $proyecto['id'] ?>">
                            <button type="submit" name="accion" value="eliminar" 
                                    onclick="return confirm('¿Seguro que quieres eliminar este proyecto?')">
                                    Eliminar
                            </button>
                        </form>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay proyectos aún.</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>© Kevin Daniel González Vargas - 2026</p>
    </footer>
</body>
</html>