<?php

$allowed=array('Actions','Errors','News','Static');
if(!isset($_GET['module'])){
	$_GET['module'] = 'Static';
}
elseif(!in_array($_GET['module'],$allowed)){
	header("Location: /main.php?module=errors&page=404");
	exit();
}
$pageallow = array('About', 'addArticles', 'articles', 'articlesread','articlesselect','DeleteArticle','DeleteEmails','DeleteMsg', 'EmailsSubs','Msgs', 'MsgsAll', 'SubEmails','Contacts','login','Admin','articlesAdm');
if(!isset($_GET['page'])){
	$_GET['page']='main';
}
elseif(!in_array($_GET['page'],$pageallow)){
header("Location: /main.php?module=errors&page=404");
exit();
}