<?php
class Database{

    // specify your own database credentials
    // localhost
    private $host = "localhost";
    private $db_name = "prominance";
    private $username = "root";
    private $password = "";

    // private $host = "182.50.133.87:3306";
    // private $db_name = "prominance";
    // private $username = "prominance";
    // private $password = "yM7o~65m";

    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
