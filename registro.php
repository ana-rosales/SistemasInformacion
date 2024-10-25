<?php
session_start();
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar y sanitizar los valores del formulario
    $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL);
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    // Preparar la consulta para insertar los datos en la base de datos
    $stmt = $pdo->prepare('INSERT INTO asistente (usuario, nombre, apellido, correo, contrasena) VALUES (:usuario, :nombre, :apellido, :correo, :contrasena)');

    try {
        $stmt->execute([
            ':usuario' => $usuario,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':correo' => $correo,
            ':contrasena' => $contrasena
        ]);

        // Redirigir al usuario a la página de inicio de sesión
        header('Location: Pagina/inicioSesion.html');
        exit;

    } /*catch (PDOException $e) {
        // Manejo de errores: error de usuario duplicado
        if ($e->getCode() === '23000') { 
            header('Location: Pagina/errorUsuarioRepetido.html');
        } else {
            header('Location: Pagina/error.html');
        }
        exit;
    }*/
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // This will display the actual SQL error.
        exit;
    }
}
?>