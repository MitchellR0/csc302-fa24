<?php
header('Content-type: application/json');

// For debugging:
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once('db.php');

// Handle incoming requests.
if(array_key_exists('action', $_POST)){
    $action = $_POST['action'];

    //I would authenticate here before making any function calls

    if($action == 'getQuizItems'){
        echo json_encode(getQuizItems());

    } else if($action == 'addQuizItem'){
        $tmp = authenticate($_POST['username'], $_POST['password']);
        if($tmp['success'] === true){
            echo json_encode(addQuizItem($_POST['quizId'], $_POST['question'], $_POST['answer']));
        }

    } else if($action == 'removeQuizItem') {
        echo json_encode(removeQuizItem($_POST['quizItemId']));


    } else if($action == 'updateQuizItem'){
        echo json_encode(updateQuizItem($_POST['quizItemId'], $_POST['quizId'], $_POST['question'], $_POST['answer']));

    } else if($action == 'addUser'){
        $password = $_POST['password'];
        $saltedHash = password_hash($password, PASSWORD_BCRYPT);
        echo json_encode(addUser($_POST['username'], $saltedHash));

    } else if($action == 'addQuiz'){
        echo json_encode(addQuiz($_POST['name'], $_POST['authorId']));

    } else {
        echo json_encode([
            'success' => false, 
            'error' => 'Invalid action: '. $action
        ]);
    }
}

function authenticate($username, $password) {

    $userinfo = getUserByUsername($username);

    if($userInfo != null && password_verify($password, $userInfo['password'])){
        echo json_encode(['success' => true]);

    } else {
        //http response code somewhere here?
        echo json_encode([
            'success' => false,
            'error' => 'The username and/or password were invalid'
        ]);

    }

}

?>