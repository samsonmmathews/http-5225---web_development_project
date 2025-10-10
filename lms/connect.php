<?php
    $connect = mysqli_connect(
        'localhost',
        'root', 
        '', // password
        'schools' // database name
    );

    if (!$connect) {
        die('Connection failed: ' . mysqli_connect_error());
    }
?>