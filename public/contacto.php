<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Kevin González</title>
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
        <section id="seccionContacto">
            <h2>Contacto</h2>
            <p>¿Tienes un proyecto o quieres colaborar? Escríbeme.</p>
            
            <?php if (!empty($mensajeExito)): ?>
                <p>
                    <?= $mensajeExito ?>
                </p>
            <?php endif; ?>

            <form id="formularioContacto" action="procesarContacto.php" method="post">
                <label for="campoNombre">Nombre completo</label>
                <input type="text" id="campoNombre" name="nombre" 
                value="<?= htmlspecialchars($nombre ?? '') ?>">
                <?php if (isset($errores['nombre'])): ?>
                    <span><?= $errores['nombre'] ?></span>
                <?php endif; ?>

                <label for="campoEmail">Correo electrónico</label>
                <input type="email" id="campoEmail" name="email" 
                value="<?= htmlspecialchars($email ?? '') ?>">
                <?php if (isset($errores['email'])): ?>
                    <span><?= $errores['email'] ?></span>
                <?php endif; ?>

                <label for="campoMensaje">Mensaje</label>
                <textarea id="campoMensaje" name="mensaje" rows="6"><?= htmlspecialchars($mensaje ?? '') ?></textarea>
                <?php if (isset($errores['mensaje'])): ?>
                    <span><?= $errores['mensaje'] ?></span>
                <?php endif; ?>

                <button type="submit">Enviar Mensaje</button>
            </form>
        </section>
    </main>

    <footer>
        <p>© Kevin Daniel González Vargas - 2026</p>
    </footer>

    <script src="../assets/js/main.js"></script>
</body>
</html>