<?php
    $quiz = array(
        array("question" => "What is the capital of Canada?",
            "answer" => "Ottawa"),
        array("question" => "Question 2",
            "answer" => "Answer 2")
    );
    // Come back to here and extract QA pairs from $_GET.

    if(array_key_exists('responses', $_POST)){
        //Parse the JSON array
        $responses = json_decode($_POST, true);
        //For loop checking answers using $quiz

            //In the loop add a field called 'correct' and set to true or false
    }
?>

