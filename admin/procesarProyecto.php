<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

require_once '../includes/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'crear') {
        $titulo       = trim($_POST['titulo'] ?? '');
        $descripcion  = trim($_POST['descripcion'] ?? '');
        $tecnologias  = trim($_POST['tecnologias'] ?? '');

        if (!empty($titulo) && !empty($descripcion)) {
            $stmt = $pdo->prepare("INSERT INTO proyectos (titulo, descripcion, tecnologias) VALUES (?, ?, ?)");
            $stmt->execute([$titulo, $descripcion, $tecnologias]);
            echo "<h2>Proyecto añadido correctamente.</h2>";
        }
    } 
    elseif ($accion === 'eliminar') {
        $id = $_POST['id'] ?? 0;
        if ($id > 0) {
            $stmt = $pdo->prepare("DELETE FROM proyectos WHERE id = ?");
            $stmt->execute([$id]);
            echo "<h2>Proyecto eliminado correctamente.</h2>";
        }
    }

    echo '<p><a href="gestionProyectos.php">Volver a Gestión de Proyectos</a></p>';
} else {
    header("Location: gestionProyectos.php");
    exit;
}
?>