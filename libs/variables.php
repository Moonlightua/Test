<?php

$allowed=array('Actions','Errors','News','Static');
if(!isset($_GET['module'])){
	$_GET['module'] = 'Static';
}
elseif(!in_array($_GET['module'],$allowed)){
	header("Location: /main.php?module=errors&page=404");
	exit();
}

if(!isset($_GET['page'])){
	$_GET['page']='main';
}