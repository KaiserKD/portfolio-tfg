<?php
require_once '../includes/conexion.php';

$stmt = $pdo->query("SELECT * FROM proyectos ORDER BY fechaCreacion DESC");
$proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Proyectos - Kevin González</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1 style="margin-top: 30px">Kevin Daniel González Vargas</h1>
        <p>Desarrollador Web Junior</p>
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
        <section id="seccionMisProyectos">
            <h2>Mis Proyectos</h2>
            <p>Aquí muestro los principales proyectos desarrollados durante el ciclo DAW.</p>
            
            <div class="contenedorProyectos">
                <?php if (count($proyectos) > 0): ?>
                    <?php foreach ($proyectos as $proyecto): ?>
                        <article class="tarjetaProyecto">
                            <h3><?= htmlspecialchars($proyecto['titulo']) ?></h3>
                            <p><?= htmlspecialchars($proyecto['descripcion']) ?></p>
                            <p><strong>Tecnologías:</strong> <?= htmlspecialchars($proyecto['tecnologias']) ?></p>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aún no hay proyectos cargados.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <footer>
        <p>© Kevin Daniel González Vargas - 2026</p>
    </footer>

    <script src="../assets/js/main.js"></script>
</body>
</html>