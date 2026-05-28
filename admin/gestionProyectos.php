<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
        <section id="seccionGestionProyectos">
            <h2>Gestionar Proyectos</h2>

            <?php if (!empty($mensajeExito)): ?>
                <p><?= $mensajeExito ?></p>
            <?php endif; ?>

            <h3>Añadir Nuevo Proyecto</h3>
            <form action="procesarProyecto.php" method="post">
                <label for="campoTitulo">Nombre del proyecto</label>
                <input type="text" id="campoTitulo" name="titulo" value="<?= htmlspecialchars($titulo ?? '') ?>">
                <?php if (isset($errores['titulo'])): ?><span><?= $errores['titulo'] ?></span><?php endif; ?>

                <label for="campoDescripcion">Descripción</label>
                <textarea id="campoDescripcion" name="descripcion" rows="4"><?= htmlspecialchars($descripcion ?? '') ?></textarea>
                <?php if (isset($errores['descripcion'])): ?><span><?= $errores['descripcion'] ?></span><?php endif; ?>

                <label for="campoTecnologias">Tecnologias</label>
                <input type="text" id="campoTecnologias" name="tecnologias" value="<?= htmlspecialchars($tecnologias ?? '') ?>" placeholder="HTML5, CSS3, PHP...">
                <?php if (isset($errores['tecnologias'])): ?><span><?= $errores['tecnologias'] ?></span><?php endif; ?>
                
                <button type="submit" name="accion" value="crear">Crear Proyecto</button>
            </form>

            <hr>

            <h3>Editar Proyecto</h3>
            <form action="procesarProyecto.php" method="post">
                <select name="id" required>
                    <option value="">Selecciona un proyecto para actualizar</option>
                    <?php foreach ($proyectos as $p): ?>
                        <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['titulo']) ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="accion" value="cargarEditar">Cargar para Editar</button>
            </form>

            <?php if (isset($proyectoEditar)): ?>
                <h3>Editando: <?= htmlspecialchars($proyectoEditar['titulo']) ?></h3>
                <form action="procesarProyecto.php" method="post">
                    <input type="hidden" name="id" value="<?= $proyectoEditar['id'] ?>">
                    <label for="campoTitulo">Nombre del proyecto</label>
                    <input type="text" name="titulo" value="<?= htmlspecialchars($proyectoEditar['titulo']) ?>" required>

                    <label for="campoDescripcion">Descripción</label>
                    <textarea name="descripcion" rows="4" required><?= htmlspecialchars($proyectoEditar['descripcion']) ?></textarea>

                    <label for="campoTecnologias">Tecnologias</label>
                    <input type="text" name="tecnologias" value="<?= htmlspecialchars($proyectoEditar['tecnologias']) ?>" required>

                    <button type="submit" name="accion" value="actualizar">Guardar Cambios</button>
                </form>
            <?php endif; ?>

            <hr>
            <h3>Proyectos Existentes (<?= count($proyectos) ?>)</h3>
            
            <?php foreach ($proyectos as $proyecto): ?>
                <div class="tarjetaProyecto">
                    <h4><?= htmlspecialchars($proyecto['titulo']) ?></h4>
                    <p><?= htmlspecialchars($proyecto['descripcion']) ?></p>
                    <p><strong>Tecnologías:</strong> <?= htmlspecialchars($proyecto['tecnologias']) ?></p>
                    <p>Fecha: <?= $proyecto['fechaCreacion'] ?></p>
                    
                    <form action="procesarProyecto.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $proyecto['id'] ?>">
                        <button type="submit" name="accion" value="eliminar" 
                            onclick="return confirm('¿Estás seguro de que deseas eliminar este proyecto?')">
                            Eliminar
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>

        </section>
    </main>

    <footer>
        <p>&copy; Kevin Daniel González Vargas - 2026</p>
    </footer>
</body>
</html>