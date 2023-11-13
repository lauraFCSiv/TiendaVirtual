<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include "menuNavegacion.php";
    ?>
     <div class="container">
     <div class="row justify-content-center mt-2">        
                <div class="col-4 text-center" style="background-color:#cefad0;">
                <h4 style="color:green;">Registro de Usuario</h4>
                <form method="post" >
                        <div class="form-group mt-2">
                            <label for="inputNombre">Nombre</label>
                            <input type="text" class="form-control mt-1" name="inputNombre" aria-describedby="nombreHelp" placeholder="Introduce el nombre">
                        </div>
                        <div class="form-group mt-3">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control mt-1" name="inputEmail" placeholder="Email">
                        </div>
                        <div class="form-group mt-3">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control mt-1" name="inputPassword" placeholder="Contraseña">
                        </div>
                        <div class="text-center mb-2">
                          <button type="submit" class="btn btn-success mt-4">Registrarse</button>
                        </div>
                    </div>                        
                </form>
                <?php 
                require 'funciones.php';
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                   insertarUsuario($_POST['inputNombre'],$_POST['inputEmail'],$_POST['inputPassword']);
                   enviarCorreoBienvenida($_POST['inputEmail']);
           
             }

            ?>
    </div>
    </div>
</body>
</html>
