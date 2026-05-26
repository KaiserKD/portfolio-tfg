<?php

$host = '127.0.0.1';
$bd = 'portfolio';
$usuario = 'root';
$contrasena = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$bd;charset=utf8mb4", $usuario, $contrasena);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>