<?php
// Conexión a la base de datos
$host_name = 'localhost';
$database = 'producto_calzado';
$user_name = 'root';
$password = '';

$conexion = mysqli_connect($host_name, $user_name, $password, $database);

if (mysqli_connect_errno()) {
    die("Error al conectarse a la base de datos: " . mysqli_connect_error());
}

// Configuración de caracteres
$conexion->query("SET NAMES 'utf8'");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Procesar la actualización
    $id = $_POST['id'];
    $sku = $_POST['sku'];
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    $tipo = $_POST['tipo'];
    $ean = $_POST['ean'];
    
    // Consulta SQL corregida
    $stmt = $conexion->prepare("UPDATE productos SET sku = ?, nombre = ?, color = ?, tipo = ?, ean = ? WHERE id_producto = ?");
    $stmt->bind_param("sssssi", $sku, $nombre, $color, $tipo, $ean, $id);

    if ($stmt->execute()) {
        echo '<script languaje="javascript">';
        echo 'alert("Producto editado exitosamente");';
        echo 'window.location="registros.php";';
        echo '</script>';
    } else {
      echo '<script language="javascript">';
      echo 'alert("Error editando registro: ' . mysqli_error($conexion) . '");'; // Muestra el error
      echo 'window.location="registros.php";'; // Redirige a la página de registros
      echo '</script>';
    }

    $stmt->close();
} else {
    // Mostrar el formulario de edición
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $stmt = $conexion->prepare("SELECT * FROM productos WHERE id_producto = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" href="css/mystyle1.css" /> 
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

            </head>
            <body><div class="container">


            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <nav class="navbar navbar-expand-sm bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="index.php">Ricardo Llanos</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav sm-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="home.php">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="registros.php">Registros</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="logout.php">Salir</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>


            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">

                    <form action="edit.php" method="POST">
                      <div class="container">

                      <div class="form-control">
                        <input type="hidden" name="id" value="<?php echo $row['id_producto']; ?>" required>
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control" name="sku" value="<?php echo $row['sku']; ?>" required>
                      </div>

                      <div class="form-group">
                        <input type="text"class="form-control"  name="nombre" value="<?php echo $row['nombre']; ?>" required>
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control" name="color" value="<?php echo $row['color']; ?>" required>
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control" name="tipo" value="<?php echo $row['tipo']; ?>" required>
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control" name="ean" value="<?php echo $row['ean']; ?>" required>
                      </div>
                      <br>

                        <div class="clearfix">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                      </div>
                    </form>
                </div>
                </div>
            </div>

            </body>
            </html>
            <?php
        } else {
            echo "Registro no encontrado.";
        }

        $stmt->close();
    } else {
        echo "ID no especificado.";
    }
}

$conexion->close();
?>
