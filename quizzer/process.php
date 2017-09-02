<?php
    include 'database.php';
    session_start();

    if(!isset($_SESSION['score'])){
            $_SESSION['score'] = 0;
    }

    /*
        Submission of each questin
    */
    if(isset($_POST['submit_question'])){
        $number = $_POST['number'];
        if(!$_POST['choice']){
            header('Location: question.php?n='.$number);
        }

        $selected_choice = $_POST['choice'];
        $next = $number+1;

        $query = "SELECT * FROM choices WHERE id = $selected_choice";
        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $is_cor = $result->fetch_assoc();


        if($is_cor['is_correct'] == 1){
            $_SESSION['score']++;
        }

        if($number == $_SESSION['total']){
            header('Location: final.php');

            exit();
        }
        else{
            header('Location: question.php?n='.$next);
        }
    }


 ?>
