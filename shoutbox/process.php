<?php

    include 'database.php';

    if(isset($_POST['submit'])){

        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        date_default_timezone_set("Europe/Sarajevo");
        $time = date('H:i:s', time());

        if(!isset($user) ||  $user == "" || !isset($message) || $message == ""){
            $error = "Please fill in your name and message";
            header('Location: index.php?error='.urlencode($error));
            exit();
        }
        else{
            $query = "INSERT INTO
            shouts (user, message, shout_time)
            VALUES
            ('{$user}', '{$message}', '{$time}')";

            if (mysqli_query($conn, $query)) {
                echo "New record created successfully";
                header('Location: index.php');
            } else {
                die("Error: " . $query . "<br>" . mysqli_error($conn));
            }

        }
    }

    else {
        echo 'problem';
    }
?>
