<?php
session_start();
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $stmt = $pdo->prepare('SELECT id, contrasena FROM usuarios WHERE usuario = :usuario');
    $stmt->execute(['usuario' => $usuario]);
    $user = $stmt->fetch();

    if ($user && password_verify($contrasena, $user['contrasena'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: Pagina/listaEventos.php');
        exit;
    } else {
        header('Location: Pagina/vuelveIniciarSesion.html');
    }
}
?>