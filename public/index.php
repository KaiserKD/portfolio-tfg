<?php
require_once '../includes/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Profesional - Kevin González</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Kevin Daniel González Vargas</h1>
        <p>Desarrollador Web Junior</p>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="proyectos.php">Proyectos</a>
            <a href="contacto.php">Contacto</a>
            <a href="../login.php">Admin</a>
        </nav>
    </header>

    <main>
        <section id="seccionSobreMi">
            <h2>Sobre mí</h2>
            <p>Soy Kevin Daniel González Vargas, estudiante de 2º DAW en FP Ibaiondo. Me apasiona el desarrollo web full-stack, especialmente crear aplicaciones funcionales con PHP y MySQL.</p>
        </section>

        <section id="seccionHabilidades">
            <h2>Habilidades Técnicas</h2>
            <p>HTML5 • CSS3 • JavaScript • PHP • MySQL • Git • Diseño Responsive</p>
        </section>
    </main>

    <footer>
        <p>© Kevin Daniel González Vargas - 2026</p>
    </footer>

    <script src="../assets/js/main.js"></script>
</body>
</html>