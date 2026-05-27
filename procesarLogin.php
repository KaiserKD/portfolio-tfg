<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$errores = [];
$usuario = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario   = trim($_POST['usuario'] ?? '');
    $password  = trim($_POST['password'] ?? '');

    if (empty($usuario)) {
        $errores['usuario'] = "Es necesario el nombre de usuario";
    }
    if (empty($password)) {
        $errores['password'] = "Es necesario una contraseña";
    }

    if (empty($errores)) {
        if ($usuario === 'admin' && $password === 'admin123') {
            $_SESSION['admin'] = true;
            header("Location: admin/panelAdmin.php");
            exit;
        } else {
            $errores['general'] = "Datos incorrectos";
        }
    }
}

include 'login.php';
?>