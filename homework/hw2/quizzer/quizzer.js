var questions = [];

$(document).ready(function(){

    // Add listeners to the buttons.
    $(document).on('click', '#add-question', addQuestion);
    $(document).on('click', '.remove-question', removeQuestion);
    $(document).on('click', '#save-quiz', saveQuiz);
    // TODO: handle quiz reset
    $(document).on('click', '#reset-quiz', saveQuiz);
    // TODO: handle quiz check
    $(document).on('click', '#check-quiz', checkQuiz);

    //Load list in the main
    loadList();
});

//Adding load function
function loadList(){
    if (localStorage.save === undefined){
        questions = []
    } else {
        questions = JSON.parse(localStorage.save)
        populateQuiz(questions);
    }
}

/**
 * Saves the quiz questions from the admin panel, updates the quiz panel.
 */
function saveQuiz(){
    // Extract all of the questions and answers.
    questions = []; // Resets the questions.
    $('#quiz-admin-questions .question').each(function(i, elm){
        var $row = $(elm).parents('tr');
        var question = $(elm).val();
        var answer = $row.find('.answer').val();
        questions.push({question: question, answer: answer});
    });

    // Save quiz.
    // TODO HW2
    //This should simply do it? Just saves the questions using localStorage with the key save.
    localStorage.save = JSON.stringify(questions);

    // Update quiz panel.
    populateQuiz(questions);
}

/**
 * Re-populates the quiz with the given questions.
 * 
 * @param questions A list of question/answer pairs (each item is an object
 *                  with the fields 'question' and 'answer').
 */
function populateQuiz(questions){
    var $quiz = $('#quiz')
    $quiz.html('');
    $('#score').html('');

    for(var i = 0; i < questions.length; i++){
        $quiz.append(`<li data-id="${i}">${questions[i].question}<br/>`+
            '<textarea rows="3" class="response"></textarea></li>');
    }
}

/**
 * Adds a new row to the quiz admin question editor table.
 */
function addQuestion(){
    var newRow = '<tr><td><textarea rows="2" class="question"></textarea></td>'+
        '<td><textarea rows="2" class="answer"></textarea></td>'+
        '<td><button class="remove-question">Delete</button></td></tr>';
    $('#quiz-admin-questions').append(newRow);
}

/**
 * Removes a new row to the quiz admin question editor table. It is assumed that
 * this is called with the context (this) of the specific "remove" button that
 * was clicked.
 */
function removeQuestion(){
    $(this).parents('tr').remove();
}

/**
 * Checks each of the answers in the quiz and marks them as correct/incorrect.
 * Also tallies up a score and records it.
 */
function checkQuiz(){
    var correct = 0;
    $('#quiz .response').each(function(i, elm){
        // TODO: check the answer and mark it as correct/incorrect.
        var $row = $(elm).parents('li')

        // Check the value of the .response textarea against the solution.
        var response = $(elm).val();
        var questionIndex = parseInt($row.data('id'));
        // questions[questionIndex]['answer']
        if(response == questions[questionIndex].answer){
            $row.addClass('correct');
            correct++;
        } else {
            $row.addClass('incorrect');
        }
    });
    $('#score').html(`Score: ${correct}/${questions.length} = ${correct/questions.length}`);
}