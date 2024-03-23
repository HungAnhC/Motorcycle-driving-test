<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../../config/db.php');
    include_once('../../model/question.php');

    $db =new db();
    $connect = $db->connect();
    // create an object of class Question
    $question = new Question($connect);

    $question->question_id = isset($_GET['id']) ? $_GET['id'] : die();

    $question->show();

    $question_item = array(
        'question_id' => $question->question_id,
        'title' => $question->title,
        'answer_a'=> $question->answer_a,
        'answer_b'=> $question->answer_b,
        'answer_c'=> $question->answer_c,
        'answer_d'=> $question->answer_d,
        'correct_answer' => $question->correct_answer
    );
    $question_item=json_encode($question_item,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
    print_r($question_item);

?>