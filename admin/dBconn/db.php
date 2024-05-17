<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ecommerce";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn -> connect_error) {
        die("connection failed: " . $conn->connect_error);
    }else{
        // echo "connection successful";
    }