<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario  = trim($_POST['usuario'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($usuario === 'admin' && $password === 'admin123') {
        $_SESSION['admin'] = true;
        header("Location: admin/panelAdmin.php");
        exit;
    } else {
        echo "<h2>Usuario o contraseña incorrectos</h2>";
        echo '<p><a href="login.php">Volver al login</a></p>';
    }
} else {
    header("Location: login.php");
    exit;
}
?>