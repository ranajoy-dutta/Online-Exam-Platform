<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "portal";

    // Create connection
    $conn = mysqli_connect($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection Failed ");
    }    
?>