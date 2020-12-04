<?php
error_reporting(-1);
use App\DeleteEntity;

require_once "router.php";


$class = new App\ArticlesCenter();
$result = $class->getArticle();

if(isset($_GET['del']) && is_numeric($_GET['del'])){
		$del = new DeleteEntity();
		$delete = $del->delete($_GET['del'],get_class($class));
		if(!$delete){
			return false;
		}else{
			header('Location: /index.php?module=Actions&page=articlesAdm');
			exit;
		}
}

if($result === false) {
	echo 'FATAL ERROR!';
}









