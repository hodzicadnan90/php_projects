<?php

    $db_host = 'localhost';
    $db_name = 'practice';
    $db_username = 'adnan';
    $db_password = 'adnan';

    $mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

    if($mysqli->connect_error){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

?>
