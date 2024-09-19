<!DOCTYPE html>
<html lang="en">
<?php
    $quizQuestions = array(
        "What is a red fruit that starts with the letter A" => "Apple",
        "Green and ____ are the signature colors of Endicott" => "Blue"
    );
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script src="quizzer.js"></script>
    <title>Quizzer</title>

    <!-- TODO: add styles. -->
    <link href='style.css' rel='stylesheet'>
</head>
<body class="quizzer">
    <h1>Quizzer</h1>
    <!-- <a href="#" class="quizzer-admin">Switch to Quizzer</a> -->
    <a href="#admin" class="quizzer">Switch to Quizzer Admin</a>

    <div id="quiz-panel" class="panel quizzer">
        <h2>Quiz</h2>
        <span id="score"></span>
        <ol id="quiz">
            <?php
                foreach($quizQuestions as $question => $answer){
                    echo "<li>$question<br/><textarea></textarea></li></li>";
                }
            ?>
        </ol>

        <button id="check-quiz">Check</button>
        <button id="reset-quiz">Reset</button>
    </div>

    <!-- <div id="quiz-admin-panel" class="panel quizzer-admin">
        <h2>Quiz Admin</h2>
        <table id="quiz-admin-questions">
            <tr>
                <th>Question</th>
                <th>Answer</th>
                <th></th>
            </tr>
        </table>
        <button id="add-question">Add question</button>
        <button id="save-quiz">Save</button> -->
    </div>

    <footer>
        <?php 
            echo "Generated on: " . date("Y-m-d");
        ?>
    </footer>
</body>
</html>