<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EjemploTablaBotones</title>
 
</head>
<body>
    <div class="container">
    <?php
        include "menuNavegacion.php";
    ?>
    <div class="row justify-content-center align-items-center mt-4">
        <div class="col text-center"><h4 style="color:green;">Tabla de productos</h4></div>
    </div>
        <div class="row justify-content-center align-items-center mt-4" style="height:300px;">

            <div class="col-12 text-center">
                <table class="table table-striped">
                    <tr>
                        <th>Producto</th>
                        <th>Categoría</th>
                        <?php
                            if (ISSET($_SESSION['idUsuario'])) {
                               echo "<th>Acciones</th>";
                            }
                        ?>
                        
                        
                    </tr>
                 
                   <?php
                    require 'funciones.php';
                    $products = getAllProducts();
                 
                    foreach ($products as $row) {
                        echo " <tr><td>".$row['nombreProducto']."</td><td>".$row['categoria']."</td>";
                        if (ISSET($_SESSION['idUsuario'])) {  
                            echo "<td><form method='post'><input type='hidden' value='".$row['id']."' name='productId'></input>   
                            <input type='number' min='1' name='cantidad'></input>             
                                <button type='submit' class='btn btn-outline-success'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>
                                        <path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z'></path>
                                        <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'></path>
                                    </svg>
                                    Añadir al carrito
                                </button>                   
                            </form>
                        </td></tr>";
                       }
                    }

                   ?>
                       
                  </tr>
                </table>
                </div>
                <div class="col-12 align-self-right">
                    <div style="float:right;">
                        <form action="carrito.php">
                            <button class="btn btn-success" type="submit">Ver carrito</button>
                        </form>
                    </div>
                </div>
               
                
            
        
        <?php     
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                agregarProductoAlCarrito($_POST['productId'],$_POST['cantidad']);               
            }
    ?>
</div>
        </div>

</body>
</html>