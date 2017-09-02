<?php

    include 'database.php';

    $query = "SELECT * FROM shouts ORDER BY id desc";
    $shouts = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SHOUT IT</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div id = "container">
            <header>
                <h1>SHOUT IT! Shoutbox</h1>
            </header>
            <div id = "shouts">
                <ul>
                    <?php foreach ($shouts as $shout): ?>
                        <li class = "shout">
                            <span>
                                <?php echo $shout['shout_time'] ?> -
                            </span>
                            <strong>
                                 <?php echo ucfirst($shout['user'])?>:
                            </strong>
                            <?php echo $shout['message']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div id = "input">
                <?php if(isset($_GET['error'])):  ?>
                    <div class="error">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php endif; ?>
                <form class="" action="process.php" method="post">
                    <input type="text" name="user" placeholder="Enter your name">
                    <input type="text" name="message" placeholder="Enter your message">
                    <br>
                    <input class = "shout-btn" type="submit" name="submit" value="Shout It Out">
                </form>
            </div>
        </div>
    </body>
</html>
