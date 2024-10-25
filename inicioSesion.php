<?php
session_start();
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize input data
    $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    $contrasena = $_POST['contrasena'];

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare('SELECT idAsistente, contrasena FROM asistente WHERE usuario = :usuario');
    $stmt->execute([':usuario' => $usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify password
    if ($user && password_verify($contrasena, $user['contrasena'])) {
        // Store user ID in session upon successful login
        $_SESSION['user_id'] = $user['idAsistente'];
        
        // Redirect to a dashboard or homepage
        header('Location: Pagina/listaEventos.php'); // Replace 'dashboard.php' with the actual page
        exit;
    } else {
        // Redirect to an error page or show an error message
        header('Location: Pagina/error.html'); // Replace 'loginError.html' with the actual error page
        exit;
    }
}
?>