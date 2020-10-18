<?php
include "W:\domains\\newphp.com/test/articles/lib.php";
$id = (int)$_GET['id'];
$result = ArticleSelect($id);
foreach($result as $item){
	$id = $item['id'];
	$title = $item['title'];
	$description = nl2br($item['description']);
	$date = $item['date'];
}

?>



