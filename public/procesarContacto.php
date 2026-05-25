<?php
require_once "../includes/conexion.php";

if (!isset($pdo)) {
    die("❌ No se pudo incluir la conexión.");
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $mensaje = trim($_POST["mensaje"] ?? '');

    if ($nombre && $email && $mensaje) {
        $sql = "INSERT INTO mensajes (nombre, email, mensaje) VALUES (:nombre, :email, :mensaje)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':mensaje' => $mensaje
        ]);
        echo "<script>alert('Mensaje enviado correctamente.'); window.location.href='contacto.html';</script>";
    } else {
        echo "<script>alert('Por favor completa todos los campos.'); history.back();</script>";
    }
}
?>
