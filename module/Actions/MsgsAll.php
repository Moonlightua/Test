<?php
namespace App;

require_once "router.php";

$class = new MessagesCenter();
$result = $class->getMessage();

if(isset($_GET['del']) && is_numeric($_GET['del'])){
	$del = new DeleteEntity();
	$delete = $del->delete($_GET['del'],get_class($class));
	if(!$delete){
		return false;
	}else{
		header('Location: /index.php?module=Actions&page=MsgsAll');
			exit;
	}
}

if($result === false) {
	echo 'FATAL ERROR!';
}







