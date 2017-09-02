<?php
    include 'database.php';
    session_start();

    if(isset($_POST['submit'])){
        $question_number = $_POST['question_number'];

        //check if the question number exists
        $check_question_num_query = "SELECT question_number FROM questions";
        $result = $mysqli->query($check_question_num_query);
        while($row = $result->fetch_assoc()){
            if($row['question_number'] == $question_number){
                echo 'Question number already exists.';
                exit();
            }

        }

        $question_text = $_POST['question_text'];
        $choices = array(
                '1' => $_POST['choice1'],
                '2' => $_POST['choice2'],
                '3' => $_POST['choice3'],
                '4' => $_POST['choice4'],
                '5' => $_POST['choice5']

        );


        //adding question
        $add_question_query = "INSERT INTO questions (question_number, text)
        VALUES ('$question_number', '$question_text')";
        if(!$mysqli->query($add_question_query))
            echo "error adding a question";



        //adding choices
        if(!isset($_POST['correct_choice']) || $_POST['correct_choice'] == ""){
            echo "The correct choice is not set";
            exit();
        }

        $correct_choice = $_POST['correct_choice'];

        foreach ($choices as $choice => $choice_text) {
            if($choice_text == "")
                break;

            if($correct_choice == $choice){
                $is_correct = 1;
            }
            else {
                $is_correct = 0;
            }

            $add_choice_query = "INSERT INTO choices (question_number, text, is_correct)
            VALUES('$question_number', '$choice_text', '$is_correct')";

            if(!$mysqli->query($add_choice_query)){
                echo "error adding a choice";

            }
        }

        $msg = "Question has been added";



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
                <h2>Add A Question</h2>
                <?php if(isset($msg)): ?>
                    <p><?php echo $msg; ?></p>
                <?php endif; ?>
                <form class="" action="add.php" method="post">
                    <p>
                        <label for="question_number">Question Number: </label>
                        <input type="number" name="question_number">
                    </p>
                    <p>
                        <label for="question_text">Question Text: </label>
                        <input type="text" name="question_text">
                    </p>
                    <p>
                        <label for="choice1">Choice #1:</label>
                        <input type="text" name="choice1">
                    </p>
                    <p>
                        <label for="choice2">Choice #2:</label>
                        <input type="text" name="choice2">
                    </p>
                    <p>
                        <label for="choice3">Choice #3:</label>
                        <input type="text" name="choice3">
                    </p>
                    <p>
                        <label for="choice4">Choice #4:</label>
                        <input type="text" name="choice4">
                    </p>
                    <p>
                        <label for="choice5">Choice 5:</label>
                        <input type="text" name="choice5">
                    </p>
                    <p>
                        <label for="correct_choice">Correct Choice Number: :</label>
                        <input type="number" name="correct_choice">
                    </p>

                    <p>
                        <input type="submit" name="submit" value = "Submit">
                    </p>
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
