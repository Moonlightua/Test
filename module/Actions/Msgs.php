<?php
namespace App;

require_once "router.php";

$email = htmlspecialchars($_POST['emails'], ENT_QUOTES);
$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$message = htmlspecialchars($_POST['text'],ENT_QUOTES);

if(empty($email)or empty($name) or empty($message)){
	return FALSE;
}else{
	$class = new MessagesCenter();
	$result = $class->addMessage($name,$email,$message);
	if($result == TRUE){
		header("Location: /");
	}else{
		echo 'No!';
	}
}









