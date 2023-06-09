<?php

    $servername = "localhost";
    $username = "root";
    $dbname = "e";

    // Create Connection
    $conn = mysqli_connect($servername, $username, '', $dbname);

    // Check Connection
    if (!$conn){
        die("Connection failed" . mysqli_connect_error());
    }

?>

