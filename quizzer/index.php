<?php
    include'database.php';
    session_start();

    $question_query = "SELECT * FROM questions";

    $result = $mysqli->query($question_query) or die($mysqli->error.__LINE__);

    $total = (int) $result->num_rows;
    $_SESSION['total'] = $total;
    $estimated_time = $total * .5;
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Quizzer</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <div class="container">
                <a href="index.php"></a><h1>PHP Quizzer</h1>
            </div>
        </header>

        <main>
            <div class="container">
                <h2>Test your PHP Knowledge</h2>
                <p>This is a multiple choice quiz to test your knowledge of PHP</p>
                <ul>
                    <li><strong>Number of questions: </strong><?php echo $total; ?></li>
                    <li><strong>Type of quiz: </strong>Multiple choice</li>
                    <li><strong>Estimated Time: </strong><?php echo $estimated_time; ?> Minutes</li>
                </ul>
                <a href="question.php?n=1" class = "start">Start Quiz</a>
            </div>
        </main>

        <footer>
            <div class="container">
                Copyright &copy; 2017, PHP Quizzer
            </div>
        </footer>
    </body>
</html>
