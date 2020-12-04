<?php

namespace App;

require_once "router.php";


$email = htmlspecialchars($_POST['email'], ENT_QUOTES);


if(empty($email)){
	return FALSE;
}else{
	$class = new EmailsCenter();
	$result = $class->addEmail($email);
	if(!$result){
		return false;
	}else{
		header("Location: /");
		exit;
	}
}
