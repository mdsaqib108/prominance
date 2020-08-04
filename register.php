<?php 

include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'register_user.php');

$create_user = new Create_user();
$new_user = $create_user->new_user();
header('location:dashboard.php');

?>