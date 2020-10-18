<?php
include "W:\domains\\newphp.com/test/articles/lib.php";
$email=clearData($_POST['email']);
if(empty($email)){
	$errMsg = "Please, try again.";
}else{
	$ok = 'OK!';
	$res = addEmail($email);
	if(!$res){
		return false;
	}else{
		header("Location: /");
		exit;
	}
}

?>