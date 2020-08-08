<?php
include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'database.php');

class Create_user {
    private $_dbConn;
    function __construct()
    {
        $db = new Database();
        $this->_dbConn = $db->getConnection();
    }

   //  
    function new_user(){
      $id=$_POST['id'];
      $first_name=$_POST['first_name'];
      $last_name=$_POST['last_name'];
      $username=$_POST['username'];
      $email=$_POST['email'];
      $password=md5($_POST['password']);

      
      $insert="insert into users (first_name, last_name, username, email, password) values ('$first_name', '$last_name','$username','$email','$password')";

      try {
          $smtp = $this->_dbConn->prepare($insert);
          $smtp->execute($data) or die(print_r($smtp->errorInfo(), true));
        } catch(PDOException $e) {
          echo $e->getMessage();
        }
    }

}
