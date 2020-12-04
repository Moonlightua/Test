<?php
namespace App;


require_once "router.php";


$class = new EmailsCenter();
$result = $class->getEmails();

if(isset($_GET['del']) && is_numeric($_GET['del'])){
	$del = new DeleteEntity();
		$del->delete($_GET['del'],get_class($class));
			header("Location: index.php?module=Actions&page=EmailsSubs");
			exit;
}

if($result === false) {
	echo 'FATAL ERROR!';
}

