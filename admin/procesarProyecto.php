<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

require_once '../includes/conexion.php';

$errores = [];
$mensajeExito = "";
$accion = $_POST['accion'] ?? '';

$titulo = $descripcion = $tecnologias = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($accion === 'crear') {
        $titulo       = trim($_POST['titulo'] ?? '');
        $descripcion  = trim($_POST['descripcion'] ?? '');
        $tecnologias  = trim($_POST['tecnologias'] ?? '');

        if (empty($titulo)) $errores['titulo'] = "El nombre del proyecto es necesario";
        if (empty($descripcion)) $errores['descripcion'] = "La descripción del proyecto es necesaria";
        if (empty($tecnologias)) $errores['tecnologias'] = "Las tecnologías son necesarias";

        if (empty($errores)) {
            $stmt = $pdo->prepare("INSERT INTO proyectos (titulo, descripcion, tecnologias) VALUES (?, ?, ?)");
            $stmt->execute([$titulo, $descripcion, $tecnologias]);
            $mensajeExito = "Has creado un proyecto.";
            $titulo = $descripcion = $tecnologias = "";
        }
    } 
    elseif ($accion === 'eliminar') {
        $id = (int)$_POST['id'];
        if ($id > 0) {
            $stmt = $pdo->prepare("DELETE FROM proyectos WHERE id = ?");
            $stmt->execute([$id]);
            $mensajeExito = "Has eliminado un proyecto.";
        }
    } 
    elseif ($accion === 'cargarEditar') {
        $id = (int)$_POST['id'];
        $stmt = $pdo->prepare("SELECT * FROM proyectos WHERE id = ?");
        $stmt->execute([$id]);
        $proyectoEditar = $stmt->fetch(PDO::FETCH_ASSOC);
    } 
    elseif ($accion === 'actualizar') {
        $id           = (int)$_POST['id'];
        $titulo       = trim($_POST['titulo'] ?? '');
        $descripcion  = trim($_POST['descripcion'] ?? '');
        $tecnologias  = trim($_POST['tecnologias'] ?? '');

        if (empty($titulo)) $errores['titulo'] = "El nombre del proyecto es necesario";
        if (empty($descripcion)) $errores['descripcion'] = "La descripción del proyecto es necesaria";
        if (empty($tecnologias)) $errores['tecnologias'] = "Las tecnologías son necesarias";

        if (empty($errores) && $id > 0) {
            $stmt = $pdo->prepare("UPDATE proyectos SET titulo=?, descripcion=?, tecnologias=? WHERE id=?");
            $stmt->execute([$titulo, $descripcion, $tecnologias, $id]);
            $mensajeExito = "Has actualizado un proyecto.";
        }
    }
}

include 'gestionProyectos.php';
?>