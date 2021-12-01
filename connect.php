<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "projecthub";

    
    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->error){
        die("Error occured" .mysqli_connect_error());
    }
?>
