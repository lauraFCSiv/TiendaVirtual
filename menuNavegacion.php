
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap demo</title>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script
	src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
	integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
	crossorigin="anonymous"></script>
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


</head>

<body>

<div class="container">
<nav class="navbar navbar-expand-lg justify-content-center">

<a class="navbar-brand" href="index.php"> <img
src="images/logo.jpg" width="100" height="90" alt="">
</a>
<button class="navbar-toggler" type="button"
    data-bs-toggle="offcanvas" data-bs-target="#opcionesMenu"
        aria-controls="opcionesMenu" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="offcanvas offcanvas-end" tabindex="-1" id="opcionesMenu"
            aria-labelledby="opcionesMenuLabel">
            <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="opcionesMenuLabel">Menú</h5>
            <button type="button" class="btn-close text-reset"
                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Productos</a></li>
                
   
                                <?php
                                if (session_status() != PHP_SESSION_ACTIVE) {
                                    session_start();
                                }
                                if (ISSET($_SESSION['idUsuario'])) {
                                    echo "<li class='nav-item'><a class='nav-link' href='carrito.php'>Carrito</a></li><li class='nav-item dropdown'><a class='nav-link dropdown-toggle-no-icon' href='#'
                                                id='navbarDropdown' role='link' data-bs-toggle='dropdown'
                                                     aria-haspopup='true' aria-expanded='false'>
                                                     <i class='bi bi-gear-wide-connected'>".$_SESSION['nombreUsuario']."</i></a> 
                                                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                                            <li><a class='dropdown-item' href='logout.php'>Desconectar</a></li></ul></li>";
                                                               
                                 }else{
                                    echo "<li class='nav-item'><a class='nav-link' href='login.php'><i class='bi bi-person'></i></a></li>";
                                  }
                                ?>
                        
					</ul>
				</div>
			</div>
		</nav>
		