<?php
include "W:\domains\\newphp.com/test/articles/lib.php";
$m=clearData($_POST['emails']);
$n=clearData($_POST['name']);
$msg=clearData($_POST['text']);
if(empty($m)or empty($n) or empty($msg)){
	$errMsg = "Please, try again.";
	echo 'EMPTY';
}else{
	$res = addMsgs($n,$m,$msg);
	if($res==TRUE){
		header("Location: /");
	}else{
		echo 'No!';
	}
}
?>








