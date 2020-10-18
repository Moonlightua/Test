<?php
include "W:\domains\\newphp.com/test/articles/lib.php";
$del = (int)$_GET['del'];
if(!$del){
	$errMsg = "Хакер, не ломай мою новостную ленту!";
}else{
	$result = deleteMsg($del);
	if(!$result){
		$errMsg = "Произошла ошибка при удалении новости";
	}else{
		header('Location: http://newphp.com/index.php?module=Actions&page=MsgsAll');
		exit;
	}
}



