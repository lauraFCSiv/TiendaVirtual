<?php

function createBD(){
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password);
    $sql = "CREATE DATABASE supermercado";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    }
}


function openConnectionDB($dbname) {   
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $db = $dbname;
    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return -1;
    }else {
        return $conn;
    }
    
}

function closeConnection($conn){
    $conn->close();
}


function createTableProducts(){
      
    $conn = openConnectionDB("supermercado");
    
    $sql = "CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombreProducto VARCHAR(255) NOT NULL,
    categoria VARCHAR(255))";
    
    $conn->query($sql);
    
    closeConnection($conn);
    
}

function createTableCarrito(){
    $conn = openConnectionDB("supermercado");

    $sql = "CREATE TABLE carrito (
        id INT AUTO_INCREMENT PRIMARY KEY,
        producto_id INT NOT NULL,
        cantidad INT NOT NULL,
        FOREIGN KEY (producto_id) REFERENCES productos(id))";
    

    $conn->query($sql);
    
    closeConnection($conn);
}


?>

