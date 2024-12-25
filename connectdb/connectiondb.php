<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '123';
    $dbName = 'rent_cars';

    $conn = mysqli_connect($servername, $username, $password, $dbName);

    if(!$conn) {
        die("Connection failed" . mysqli_connect_error());
    }
?>