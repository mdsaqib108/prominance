<?php
session_start();
error_reporting(0);
include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST['login']))
{
$un=$_POST['un'];
$ps=md5($_POST['ps']);
$sql ="SELECT * FROM users WHERE email=:un and password=:ps";
$query= $dbh -> prepare($sql);
$query-> bindParam(':un', $un, PDO::PARAM_STR);
$query-> bindParam(':ps', $ps, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
 foreach ($results as $result) {
 $_SESSION['stdid']=$result->id;
 $_SESSION['login']=$_POST['un'];
 $_SESSION['email']=$result->email;
 $_SESSION['name']=$result->name;
 $_SESSION['display_name']=$result->display_name;
 $_SESSION['role']=$result->role;
echo "<script type='text/javascript'> document.location ='index.html'; </script>";
}
}
else{
echo "<script>alert('Invalid Details');</script>";
}
}
?>