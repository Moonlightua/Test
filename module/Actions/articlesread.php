<?php
include "W:\domains\\newphp.com/test/articles/lib.php";
include "articlesselect.php";
$id = (int)$_GET['id'];
$result = ArticleSelect($id);
foreach($result as $item){
	$id = $item['id'];
	$title = $item['title'];
	$description = nl2br($item['description']);
	$date = $item['date'];
}
echo "<pre>";
print_r($item);

?>





