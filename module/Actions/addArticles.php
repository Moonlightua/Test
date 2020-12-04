<?php

use App\ArticlesCenter;

require_once "router.php";

$title = htmlspecialchars($_POST['title'],ENT_QUOTES);
$description = htmlspecialchars($_POST['description'],ENT_QUOTES);

if(empty($title) or empty($description)){

}else{
	$class = new ArticlesCenter();
	$result = $class->addArticles($title,$description);
	if(!$result){
	echo 'Adding Error!';
	}else{
		header("Location: http://newgeneration.com/index.php?module=Actions&page=addArticles");
	}
}
?>

