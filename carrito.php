<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include "menuNavegacion.php";
    ?>
    <div class="container">
    <div class="row justify-content-center align-items-center mt-4">
        <div class="col text-center"><h4 style="color:green;">Carrito</h4></div>
    </div>
        <div class="row justify-content-center align-items-center mt-4" style="height:300px;">
            <div class="col-12 text-center">
                <table class="table table-striped">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                 
                   <?php
                    require 'funciones.php';
                    $products = getProductsCarrito();
                    while ($row = $products->fetch_assoc()) {
                        echo " <tr><td>".$row['producto_id']."</td><td>".$row['cantidad']."</td>";
                        echo "<td><form method='post'><input type='hidden' value='".$row['id']."' name='carritoElemId'></input>              
                        <button type='submit' class='btn btn-outline-danger'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-x' viewBox='0 0 16 16'>
                         <path d='M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z'></path>
                         <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'></path>
                        </svg>
                        Eliminar del carrito
                      </button>             
                        </form>
                    </td></tr>";
                    }

                   ?>
                       
                  </tr>
                </table>
            </div>
            <div class="col-12 align-self-right">
                    <div style="float:right;">
                        <form action="index.php">
                            <button class="btn btn-success" type="submit">Volver a Productos</button>
                        </form>
                    </div>
                </div>
               
        </div>
        <?php
       
        
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   eliminarProductoDelCarrito($_POST['carritoElemId']);  
   header("Location:carrito.php");             
  }
?>
</div>


    
</body>
</html>