<?php
include "W:\domains\\newphp.com/test/articles/config.php";



function clearData($data){
	global $link;
 $data = mysqli_real_escape_string($link,$data);
	return $data;
}

function addArticle($title, $description) {
	global $link;
	$dt = date("Y-M-d H:i:s");
	$sql = "INSERT INTO article(Title,Description,Date) VALUES('$title', '$description', '$dt')";
	$res = mysqli_query($link, $sql);
	if($res == false) {
		echo "Can't add article!";
	}
	else {
		return true;
	}
}

 function db2Arr($data){
	$arr = array();
	while($row = mysqli_fetch_all($data,MYSQLI_ASSOC))
		$arr[] = $row;
	return $arr;
}

function getArticle(){
	global $link;
	$sql = "SELECT id, title, description, date FROM article ORDER BY id DESC";
	$res = mysqli_query($link,$sql);
	if(!$res){
		return false;
	}else{
		return db2Arr($res);
	}
}

function getArticleList(){
	global $link;
	$sql = "SELECT id, title, description, date FROM article ORDER BY id DESC LIMIT 3";
	$res = mysqli_query($link,$sql);
	if(!$res){
		return false;
	}else{
		return db2Arr($res);
	}
}

