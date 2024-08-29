<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap en HTML</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <section class="content">
        <div class="container">
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
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card bg-danger text-center text-white">
                        <h3>Ingrese el Calzado</h3>
                    </div>

                    <form action="controladores/registro.php" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <hr>
                                    <div class="form-group">
                                        <label for="nombre1" style="color: blue;">SKU</label>
                                        <input type="text" class="form-control" name="sku" id="sku" placeholder="Digite el SKU" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="" style="color: blue;"> Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Digite el Nombre del producto">
                                    </div>

                                    <div class="form-group">
                                        <label for="color" style="color:blue;">Color</label>
                                        <input type="text" class="form-control" name="color" id="color" placeholder="Digite el Color" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="tipo" style="color: blue;">Tipo</label>
                                        <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Digite el tipo de calzado">
                                    </div>

                                    <div class="form-group">
                                        <label for="ean" style="color: blue;">EAN</label>
                                        <input type="text" class="form-control" name="ean" id="ean" placeholder="Digite Número de ean" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-danger btn-lg">Registrar</button>
                        </div>
                    </form>

                </div>
               <!--  <div class="col-md-2"></div> -->
            </div>
        </div>
    </section>



    <script src="js/bootstrap.min.js"></script>
</body>

</html>