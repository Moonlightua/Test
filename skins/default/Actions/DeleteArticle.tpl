<?php
$del = (int)$_GET['del'];
if(!$del){
	$errMsg = "Хакер, не ломай мою новостную ленту!";
}else{
	$result = deleteArticle($del);
	if(!$result){
		$errMsg = "Произошла ошибка при удалении новости";
	}else{
		header('Location: ' . $_SERVER['PHP_SELF']);
		exit;
	}
}



