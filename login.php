<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EjemploTablaBotones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <?php
        include "menuNavegacion.php";
        ?>
         <p>
            <?php
            require 'funciones.php';
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $usuarios = loginUser($_POST['inputEmail'], $_POST['inputPassword']);

                //TODO : Comprobar si devuelve usuarios
                    foreach ($usuarios as $row) {
                        $_SESSION['idUsuario'] = $row['id'];
                        $_SESSION['nombreUsuario'] = $row['nombre'];
                    }
                    header("Location:index.php");

                
            }

            ?>
        </p>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-4 text-center" style="background-color:#cefad0;">
                    <h4 style="color:green;">Login de Usuario</h4>
                    <form method="post">
                        <div class="form-group mt-2">
                            <label for="inputEmail ">Email</label>
                            <input type="email" class="form-control mt-1" name="inputEmail" aria-describedby="emailHelp"
                                placeholder="Introduce el email">
                        </div>
                        <div class="form-group mt-3">
                            <label for="inputPassword">Contraseña</label>
                            <input type="password" class="form-control mt-1" name="inputPassword"
                                placeholder="Contraseña">
                        </div>
                        <div class="mt-1"><p>No eres cliente? Registrate <a style="color:red;" href="registro.php"> aquí </a>
                        <div class="text-center mb-2">
                            <button type="submit" class="btn btn-success mt-4">Submit</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div>
       
    </div>