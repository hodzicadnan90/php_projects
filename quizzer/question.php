<?php
    include'database.php';
    session_start();
    if(isset($_GET['n'])){
        $number = (int) $_GET['n'];

        if($number == 1)
            $_SESSION['score'] = 0;
        $question_query = "SELECT * FROM questions WHERE question_number = $number";

        $result = $mysqli->query($question_query) or die($mysqli->error.__LINE__);

        $question = $result->fetch_assoc();


        $choices_query = "SELECT * FROM choices WHERE question_number = $number";

        $choices = $mysqli->query($choices_query) or die($mysqli->error.__LINE__);




    }

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
                <h1>PHP Quizzer</h1>
            </div>
        </header>

        <main>
            <div class="container">
                <div class="current">
                    Question <?php echo $number; ?> of <?php echo $_SESSION['total']; ?>
                </div>
                <p class = "question">
                    <?php echo $question['text']; ?>
                </p>
                <form class="" action="process.php" method="post">
                    <ul class = "choices">

                        <?php while($row=$choices->fetch_assoc()): ?>
                        <li>
                            <input type="radio" name="choice" value="<?php echo $row['id']; ?>">
                            <?php echo $row['text']; ?>
                        </li>
                        <?php endwhile; ?>

                    </ul>
                    <input type="submit" name="submit_question" value = "Submit">
                    <input type="hidden" name="number" value="<?php echo $number; ?>">
                </form>
            </div>
        </main>

        <footer>
            <div class="container">
                Copyright &copy; 2017, PHP Quizzer
            </div>
        </footer>
    </body>
</html>
