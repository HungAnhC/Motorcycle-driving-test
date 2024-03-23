<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../../config/db.php');
    include_once('../../model/question.php');

    $db =new db();
    $connect = $db->connect();
    // create an object of class Question
    $question = new Question($connect);
    // call the read() method of $question object
    $read = $question->read();
    // The rowCount is used to count the number of rows of data
    $num =$read->rowCount();

    // condittion
    if($num > 0){
        $question_array = [];
        $question_array['data'] = [];
        
        // the fetch() function is used to fetch a row from the result of a query
        // (PDO::FETCH_ASSOC) is used to get rows as an associative array
        while($row = $read->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $question_item = array(
                'question_id'=> $question_id,
                'title' => $title,
                'answer_a'=> $answer_a,
                'answer_b'=> $answer_b,
                'answer_c'=> $answer_c,
                'answer_d'=> $answer_d,
                'correct_answer'=> $correct_answer
            );
            array_push($question_array['data'],$question_item);
        }
        $question_array=json_encode($question_array,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
        
        echo $question_array;
    }


?>