<?php

// Create connection

    $con = new mysqli("sql12.freesqldatabase.com", "sql12630523", "2rnI9AiqCc", "sql12630523");

// Check connection

    if ($con->connect_error){
        die("Connection failed: " . $con->connect_error);
    } else {
        echo "<script>console.log('Database Connect Successful')</script>";
    }
    
?>
