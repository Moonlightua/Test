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


function addEmail($email) {
	global $link;
	$dt = date("Y-M-d H:i:s");
	$sql = "INSERT INTO emails(email,Date) VALUES('$email', '$dt')";
	$res = mysqli_query($link, $sql);
	if($res == false) {
		echo "Can't add Email!";
	}
	else {
		return true;
	}
}

function getEmails(){
	global $link;
	$sql = "SELECT id, email, date FROM emails ORDER BY id DESC";
	$res = mysqli_query($link,$sql);
	if(!$res){
		return false;
	}else{
		return db2Arr($res);
	}
}

function addMsgs($name,$email,$msg) {
	global $link;
	$dt = date("Y-M-d H:i:s");
	$sql = "INSERT INTO msgs(name, email, message, Date) VALUES('$name','$email', '$msg', '$dt')";
	$res = mysqli_query($link, $sql);
	if($res == false) {
		echo "Can't add Msg!";
	}
	else {
		return true;
	}
}

function getMsgs(){
	global $link;
	$sql = "SELECT id, name, email, message, date FROM msgs ORDER BY id DESC";
	$res = mysqli_query($link,$sql);
	if(!$res){
		return false;
	}else{
		return db2Arr($res);
	}
}

 function deleteArticle($id){
	global $link;

		$sql = "DELETE FROM article WHERE id = $id";
		$result = mysqli_query($link, $sql);
		if (!$result){
			return false;
		}else{
			return true;
		}
}

function deleteMsg($id){
	global $link;
	$sql = "DELETE FROM msgs WHERE id = $id";
	$result = mysqli_query($link, $sql);
	if (!$result){
		return false;
	}else{
		return true;
	}
}

function deleteEmail($id){
	global $link;
	$sql = "DELETE FROM emails WHERE id = $id";
	$result = mysqli_query($link, $sql);
	if (!$result){
		return false;
	}else{
		return true;
	}
}

function ArticleSelect($id){
	global $link;
	$sql = "SELECT * FROM article WHERE id = $id";
	$result = mysqli_query($link, $sql);
	if (!$result){
		return false;
	}else{
		return db2Arr($result);
	}
}

