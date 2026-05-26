<?php

require_once '../includes/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre  = trim($_POST['nombre'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');

    if (empty($nombre) || empty($email) || empty($mensaje)) {
        die("Error: Todos los campos son obligatorios.");
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO mensajes (nombre, email, mensaje) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $email, $mensaje]);

        echo "<h2>Mensaje enviado correctamente. Gracias por contactarme.</h2>";
        echo '<p><a href="contacto.php">Volver al formulario</a></p>';
    } catch (PDOException $e) {
        echo "Error al guardar el mensaje: " . $e->getMessage();
    }
} else {
    header("Location: contacto.php");
    exit;
}
?>