<?php

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "data";

    $con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    if (!$con) {
        echo "Not connection";
    }

?>