<?php
session_start(); // Inicia la sesión

// Incluye el archivo de conexión a la base de datos
include "controladores/conexion.php";

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepara la consulta para evitar inyección SQL
    $stmt = $conexion->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Verifica si el usuario existe
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Verifica la contraseña
        if (password_verify($password, $hashed_password)) {
            // La contraseña es correcta, inicia sesión
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;

            // Redirige a la página de inicio o a la página deseada
            header('Location: home.php');
            exit();
        } else {
            // La contraseña es incorrecta
            $error_message = "Usuario o contraseña incorrectos.";
        }
    } else {
        // El usuario no existe
        $error_message = "Usuario o contraseña incorrectos.";
    }

    // Cierra la declaración y la conexión
    $stmt->close();
    $conexion->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mystyle1.css">
    <style>
        body {
            background-color: #f8f9fa; /* Fondo gris claro */
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-form {
            background-color: #fff; /* Fondo blanco para el formulario */
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="login-form">
            <h2 class="text-center">Iniciar Sesión</h2>
            <hr/>
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Usuario" name="username" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Iniciar Sesión</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </div>
                <p class="mt-3">Si no estás registrado, ingresa tus datos <a href="registration.php">aquí</a>.</p>
            </form>

            <?php
            // Muestra el mensaje de error si existe
            if (isset($error_message)) {
                echo "<p class='text-danger'>$error_message</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
