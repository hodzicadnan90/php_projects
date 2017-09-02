<?php

    $conn = mysqli_connect("localhost", "adnan", "adnan", "practice");

    if(mysqli_connect_errno()){
        echo 'Failed to connect to MySql db: ' . mysqli_connect_error();
    }
?>
