<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:PUT');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


    include_once('../../config/db.php');
    include_once('../../model/question.php');

    $db =new db();
    $connect = $db->connect();
    // create an object of class Question
    $question = new Question($connect);

    $data = json_decode(file_get_contents("php://input"));

    $question->question_id = $data->question_id;
    $question->title = $data->title;
    $question->answer_a = $data->answer_a;
    $question->answer_b = $data->answer_b;
    $question->answer_c = $data->answer_c;
    $question->answer_d = $data->answer_d;
    $question->correct_answer = $data->correct_answer;
    
    if($question->update()){
        echo json_encode(array('message','Question Updated'));

    }else{
        echo json_encode(array('message','Question Not Updated'));
    }
?>