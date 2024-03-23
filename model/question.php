<?php
class Question {
    private $conn;
    //question properties
    public $question_id ;
    public $title ;
    public $answer_a ;
    public $answer_b ;
    public $answer_c ;
    public $answer_d ;
    public $correct_answer;
    // connect db
    public function __construct($db)
    {
        $this->conn = $db;
    }
    //read data
    public function read(){
        $query = "SELECT * FROM question ORDER BY question_id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    //show data
    public function show(){
        $query = "SELECT * FROM question WHERE question_id=? LIMIT 1";
        $stmt  = $this->conn->prepare($query);
        $stmt ->bindParam(1,$this->question_id);
        $stmt ->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->title = $row['title'];
        $this->answer_a = $row['answer_a'];
        $this->answer_b = $row['answer_b'];
        $this->answer_c = $row['answer_c'];
        $this->answer_d = $row['answer_d'];
        $this->correct_answer = $row['correct_answer'];

    }
    //create data
    public function create(){
        $query = "INSERT INTO question SET title=:title,answer_a=:answer_a,answer_b=:answer_b,answer_c=:answer_c,answer_d=:answer_d,correct_answer=:correct_answer";
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->answer_a  =  htmlspecialchars(strip_tags($this->answer_a));
        $this->answer_b = htmlspecialchars(strip_tags($this->answer_b));
        $this->answer_c = htmlspecialchars(strip_tags($this->answer_c));
        $this->answer_d = htmlspecialchars(strip_tags($this->answer_d));
        $this->correct_answer = htmlspecialchars(strip_tags($this->correct_answer));

        //bind data
        $stmt->bindParam(':title',$this->title);
        $stmt->bindParam(':answer_a',$this->answer_a);
        $stmt->bindParam(':answer_b',$this->answer_b);
        $stmt->bindParam(':answer_c',$this->answer_c);
        $stmt->bindParam(':answer_d',$this->answer_d);
        $stmt->bindParam(':correct_answer',$this->correct_answer);

        if($stmt->execute()){
            return true;
        }
        printf("Error %s.\n",$stmt->error);
        return false;
    }
    //update data
    public function update(){
        $query = "UPDATE question SET title=:title,answer_a=:answer_a,answer_b=:answer_b,answer_c=:answer_c,answer_d=:answer_d,correct_answer=:correct_answer
            WHERE question_id=:question_id";
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->answer_a  =  htmlspecialchars(strip_tags($this->answer_a));
        $this->answer_b = htmlspecialchars(strip_tags($this->answer_b));
        $this->answer_c = htmlspecialchars(strip_tags($this->answer_c));
        $this->answer_d = htmlspecialchars(strip_tags($this->answer_d));
        $this->correct_answer = htmlspecialchars(strip_tags($this->correct_answer));
        $this->question_id = htmlspecialchars(strip_tags($this->question_id));

        //bind data
        $stmt->bindParam(':title',$this->title);
        $stmt->bindParam(':answer_a',$this->answer_a);
        $stmt->bindParam(':answer_b',$this->answer_b);
        $stmt->bindParam(':answer_c',$this->answer_c);
        $stmt->bindParam(':answer_d',$this->answer_d);
        $stmt->bindParam(':correct_answer',$this->correct_answer);
        $stmt->bindParam(':question_id',$this->question_id);

        if($stmt->execute()){
            return true;
        }
        printf("Error %s.\n",$stmt->error);
        return false;
    }
        //delete data
        public function delete(){
            $query = "DELETE FROM question WHERE question_id=:question_id";
            $stmt = $this->conn->prepare($query);
            //clean data
           
            $this->question_id = htmlspecialchars(strip_tags($this->question_id));
    
            //bind data
            
            $stmt->bindParam(':question_id',$this->question_id);
    
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n",$stmt->error);
            return false;
        }
    
}
?>