<?php
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($server, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection Failed ");
    }    
?>