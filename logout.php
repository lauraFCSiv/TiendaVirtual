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
        include 'menuNavegacion.php';   
        // La sesión está activa, entonces la destruimos
        session_unset(); // Limpia las variables de sesión
        session_destroy(); // Destruye la sesión
    ?>
         <p>
         
           <div class='row justify-content-center align-items-center' style="height:300px;">
               <div class='col-6 text-center'><h6 style="color:green;">Gracias por visitarnos</h6> </div>
           </div>
       
        </p>
      
    </div>
    <div>
       
    </div>