<?php
// Incluye el archivo de conexión a la base de datos
include "conexion.php";

// Recoge los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$segundoapellido = $_POST['segundoapellido'];
$birthdate = $_POST['birthdate'];
$username = $_POST['username'];
$password = $_POST['password'];

// Encriptar la contraseña antes de almacenarla
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Usar declaraciones preparadas para prevenir inyección SQL
$stmt = $conexion->prepare("INSERT INTO users (nombre, apellido, segundoapellido, birthdate, username, password) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nombre, $apellido, $segundoapellido, $birthdate, $username, $hashed_password);

if ($stmt->execute()) {
    // Redirigir a la página de registros si la inserción es exitosa
    header('Location: ../registros.php');
} else {
    // Redirigir a la página de índice si hay un error y mostrar el error
    echo "Error: " . $stmt->error;
    header('Location: ../index.php');
}

// Cierra la declaración y la conexión
$stmt->close();
$conexion->close();
?>
