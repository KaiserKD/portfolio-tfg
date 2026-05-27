<?php
require_once '../includes/conexion.php';

$errores = [];
$mensajeExito = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre  = trim($_POST['nombre'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');

    if (empty($nombre)) {
        $errores['nombre'] = "Es necesario introducir un nombre";
    }
    if (empty($email)) {
        $errores['email'] = "Es necesario introducir un correo válido";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = "No es un correo válido";
    }
    if (empty($mensaje)) {
        $errores['mensaje'] = "Es necesario introducir un mensaje";
    }

    if (empty($errores)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO mensajes (nombre, email, mensaje) VALUES (?, ?, ?)");
            $stmt->execute([$nombre, $email, $mensaje]);
            $mensajeExito = "¡Gracias por enviar tu mensaje!";
            
            $nombre = $email = $mensaje = "";
        } catch (PDOException $e) {
            $errores['general'] = "Ha ocurrido un error, inténtalo de nuevo.";
        }
    }
}

include 'contacto.php';
?>