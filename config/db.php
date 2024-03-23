<?php
class db{
// connect database by PDO
    private $severname  =  "localhost";
    private $username = "root";
    private $password = "";
    private $db  = "restful_api_php";
    private $conn;
    public function connect(){
        $this->conn =  null;
        try {

            $this->conn = new PDO("mysql:host=".$this->severname.";dbname=".$this->db."",$this->username,$this->password);
            // set the  PDO  error mode to  exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            echo "Connection failed:".$e->getMessage();
        }
        return $this->conn;
    }
}
?>