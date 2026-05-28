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
    <header id="cabeceraHero">
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
        <div id="bloqueHero">
            <h1 id="tituloHero">Kevin Daniel González Vargas</h1>
            <p id="subtituloHero">Desarrollador Web Junior</p>
            <p id="resumenHero">Diseño y desarrollo de aplicaciones web a medida con integraciones robustas y experiencias digitales optimizadas de principio a fin.</p>
            <a href="proyectos.php" id="enlaceHero">Explorar Proyectos</a>
        </div>
    </header>

    <main id="contenedorPrincipal">
        <section id="seccionSobreMi">
            <h2>Sobre mí</h2>
            <div id="bloqueBiografia">
                <p>Soy Kevin Daniel González Vargas, estudiante de 2º DAW en FP Ibaiondo. Me apasiona el desarrollo web full-stack, especialmente crear aplicaciones funcionales con PHP y MySQL.</p>
                <p>Mi objetivo principal es construir herramientas digitales eficientes utilizando estándares limpios. Me enfoco en resolver lógicas complejas en el lado del servidor mientras diseño interfaces adaptables and atractivas en el lado del cliente.</p>
            </div>
        </section>

        <section id="seccionHabilidades">
            <h2>Habilidades Técnicas</h2>
            <div id="cuadrillaHabilidades">
                <span class="etiquetaTecnica">HTML5</span>
                <span class="etiquetaTecnica">CSS3</span>
                <span class="etiquetaTecnica">JavaScript</span>
                <span class="etiquetaTecnica">PHP</span>
                <span class="etiquetaTecnica">MySQL</span>
                <span class="etiquetaTecnica">Git</span>
                <span class="etiquetaTecnica">Diseño Responsive</span>
            </div>
        </section>
    </main>

    <footer>
        <p>© Kevin Daniel González Vargas - 2026</p>
    </footer>

    <script src="../assets/js/main.js"></script>
</body>
</html>