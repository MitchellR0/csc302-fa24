<?php

    require "questions.php";

    if(array_key_exists('responses', $_POST)){
        //Parse the JSON array
        $responses = json_decode($_POST, true);
        //For loop checking answers using $quiz
        foreach ($responses as $questionAnswerArray){
            
        }
            //In the loop add a field called 'correct' and set to true or false
    }
?>

