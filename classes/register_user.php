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
      

      $thinksoftResumeName = $_FILES['thinksoft_resume']['name'];
      $thinksoftResumePath = $_FILES['thinksoft_resume']['tmp_name'];
      $fileInfo1 = pathinfo($_FILES["thinksoft_resume"]["name"]);
      $without_extension = substr($thinksoftResumeName, 0, strrpos($thinksoftResumeName, "."));
      $fileName1 = $without_extension . '_'. uniqid(). '.' . $fileInfo1['extension'];
      

	  $digitResumeName = $_FILES['digit_resume']['name'];
	  $digitResumePath = $_FILES['digit_resume']['tmp_name'];
    $fileInfo2 = pathinfo($_FILES["digit_resume"]["name"]);
    $without_extension = substr($digitResumeName, 0, strrpos($digitResumeName, "."));
    $fileName2 = $without_extension . '_'. uniqid(). '.' . $fileInfo2['extension'];


      move_uploaded_file($thinksoftResumePath,"content/thinksoft_resumes/$fileName1");

      move_uploaded_file($digitResumePath,"content/digit_resumes/$fileName2");

      $insert="insert into users (first_name, last_name, username, email, password) values ('$first_name', '$last_name','$username','$email','$password')";

      try {
          $smtp = $this->_dbConn->prepare($insert);
          $smtp->execute($data) or die(print_r($smtp->errorInfo(), true));
        } catch(PDOException $e) {
          echo $e->getMessage();
        }
    }

}
