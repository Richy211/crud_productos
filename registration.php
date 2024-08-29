<!-- 
<?php
	include("session.php");
?> -->
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/mystyle1.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
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
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="home.php">Inicio</a>
                                    </li>
 
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-md-2"></div>
            </div>



            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">

                    <h2>Registrarse</h2>
                    <hr/>
                            <form action="controladores/register.php" method="POST">
                      

                                <div class="form-group">
                                <label for="Nombre">Nombre</label>
                                <input type="text"  class="form-control" placeholder="Nombre" name="nombre" required>
                                </div>

                                <div class="form-group">
                                <label for="Apellido">Apellido</label>
                                <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
                                </div>        

                                <div class="form-group">
                                <label for="Segundo Apellido">Segundo Apellido</label>
                                <input type="text" class="form-control" placeholder="Segundo Apellido" name="segundoapellido" required>
                                </div>


                               <div class="form-group">
                               <label>Fecha de Nacimiento</label>
                               <input type="date" class="form-control" name="birthdate" required>
                               </div>

                               <div class="from-group">
                                <label for="Nombre de Usuario">Nombre de Usuario</label>
                               <input type="text" class="form-control" placeholder="Usuario" name="username" required>
                               </div>

                               <div class="form-group">
                                <label for="Nueva Contraseña">Nueva Contraseña</label>
                               <input type="password" class="form-control" placeholder="Nueva Contraseña" name="password" required>
                               </div>

                               <div class="form-group">
                                <label for="Repita la contraseña">Repita la contraseña</label>
                               <input type="password" class="form-control" placeholder="Repetir Contraseña" name="psw-repeat" required>
                               </div> 

                                                          
                                
                                <div class="clearfix">
                                <button type="submit" class="btn btn-primary">Registrarse</button>
                                <button type="reset" class="btn btn-danger">Cancelar</button>
                                </div>
                            
                            </form>
                    </div>
            </div></div>
</div>
</body>
</html>
