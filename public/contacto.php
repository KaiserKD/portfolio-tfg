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
        <section id="seccionContacto">
            <h2>Contacto</h2>
            <p>¿Tienes un proyecto o quieres colaborar? Escríbeme y te responderé lo antes posible.</p>
            
            <form id="formularioContacto" action="procesarContacto.php" method="post">
                <label for="campoNombre">Nombre completo</label>
                <input type="text" id="campoNombre" name="nombre" required>
                
                <label for="campoEmail">Correo electrónico</label>
                <input type="email" id="campoEmail" name="email" required>
                
                <label for="campoMensaje">Mensaje</label>
                <textarea id="campoMensaje" name="mensaje" rows="6" required></textarea>
                
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