
<?php
require 'funcionesBD.php';
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function agregarProductoAlCarrito($productId, $cantidad){
    $conn = openConnectionDB("supermercado");

    //Recuperar el elemento del carrito
    $sql = "SELECT * FROM carrito WHERE producto_id = '".$productId."'";
    
    $result = $conn->query($sql);

    //Si no existe se añade
    if($result -> num_rows == 0){
        $sqlInsert = "INSERT INTO carrito (producto_id, cantidad) VALUES ('".$productId."','".$cantidad."')";
    
        if ($conn->query($sqlInsert) === TRUE) {
            echo "<div class='row justify-content-center'> <div class='col-6 text-center'><h5 style='color:green;'>Elemento agregado al carrito con éxito.</h5></div></div>";
        } else {
            echo "<div class='row justify-content-center'> <div class='col-6 text-center'><h5 style='color:green;'>Error al agregar el producto al carrito </h5></div></div>" . $conn->error;
        }   
    }else{
        $sqlUpdate = "UPDATE carrito SET cantidad = '".$cantidad."' WHERE producto_id ='".$productId."'";
        if ($conn->query($sqlUpdate) === TRUE) {
            echo "<div class='row justify-content-center'> <div class='col-6 text-center'><h5 style='color:green;'>Elemento agregado al carrito con éxito.</h5></div></div>";
        } else {
            echo "<div class='row justify-content-center'> <div class='col-6 text-center'><h5 style='color:green;'>Error al agregar el producto al carrito </h5></div></div>" . $conn->error;
        }   
    }

    
    // Cerrar la conexión a la base de datos
    $conn->close();
    
}

function getAllProducts(){
    $conn = openConnectionDB("supermercado");
    
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);

    // Cerrar la conexión a la base de datos
    $conn->close();
   
    return $result;
}

function getProductsCarrito(){
    $conn = openConnectionDB("supermercado");
    
    $sql = "SELECT * FROM carrito";
    $result = $conn->query($sql);

    // Cerrar la conexión a la base de datos
    $conn->close();
   
    return $result;
}



function eliminarProductoDelCarrito($carritoElementId){
    $conn = openConnectionDB("supermercado");
    
    $sql = "DELETE FROM carrito WHERE id = '".$carritoElementId."'";
    $conn->query($sql);
    $conn->close();
  
}

function loginUsuario($email, $password){
    $conn = openConnectionDB("supermercado");
    
    $sql = "select * from usuario where email= '" . $email."' AND password= '" . $password."' ";
    
    $result = $conn->query($sql);
  
    closeConnection($conn);
    
    return $result;
}

function insertarUsuario($nombre, $email,$password){
    $conn = openConnectionDB("supermercado");
    
    $sqlInsert = "INSERT INTO usuario (nombre,email,password) VALUES ('".$nombre."','".$email."','".$password."')";
    
    if ($conn->query($sqlInsert) === TRUE) {
        echo "<div class='row justify-content-center'> <div class='col-6 text-center'><h5 style='color:green;'>Usuario registrado con éxito.</h5></div></div>";
    } else {
        echo "<div class='row justify-content-center'> <div class='col-6 text-center'><h5 style='color:green;'>Error al agregar el usuario</h5></div></div>" . $conn->error;
    }  

    $conn->close();
  
}

function enviarCorreoBienvenida($destinatario){
    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
       /* $mail->Host = 'smtp.mail.yahoo.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->Username = 'pruebamailerphp';
        $mail->Password = 'aulaNosa2023';*/
        $mail->Host = 'DESKTOP-5LI1KUN';
        $mail->SMTPAuth = false;
        $mail->Username = '';
        $mail->Password = '';
        $mail->Port = 25;
        

        // Configuración del correo
        $mail->setFrom('pruebamailerphp@yahoo.com', 'Supermercado');
        $mail->addAddress('laurafraguio@gmail.com');
        $mail->Subject = "Bienvenid@ a nuestro supermercado online";
        $mail->Body = "No olvide activar su tarjeta cliente para acceder a numerosos descuentos";
   
        $result = $mail->send();
        if ($result === TRUE) {
            echo "Correo enviado";
        }else{
            echo "Error en el envio de correo";
        }

    } catch (Exception $e) {
        return $e->getMessage();
    }
}
