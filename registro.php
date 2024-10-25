<?php
session_start();
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $correo = filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL);

    $stmt = $pdo->prepare('INSERT INTO asistente (usuario, contrasena, correo) VALUES (:usuario, :contrasena, :correo)');
    
    try {
        $stmt->execute([
            ':usuario' => $usuario,
            ':contrasena' => $contrasena,
            ':correo' => $correo
        ]);
        
        header('Location: inicioSesion.html');
    } catch (PDOException $e) {
        if ($e->getCode() === '23000') { 
            header('Location: errorUsuarioRepetido.html');
        } else {
            header('Location: error.html');
        }
    }
}
?>