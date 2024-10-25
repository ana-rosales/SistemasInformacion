<?php
include_once 'credenciales.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$sql = "SELECT usuario FROM asistente WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    session_start();
    $_SESSION['usuario'] = $usuario;
    header('Location: Pagina/index.html');
    exit();
} else {
    header('Location: error.html');
    exit();
}

$conexion->close();
?>