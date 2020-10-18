<?php
include "W:\domains\\newphp.com/test/articles/lib.php";
if(isset($_GET['del']) && is_numeric($_GET['del'])){
	include "DeleteArticle.php";
}

$result = getArticle();

if($result === false) {
	echo 'FATAL ERROR!';
}
else {
	foreach($result as $item) {
		$id = $item['id'];
		$title = $item['title'];
		$description = nl2br($item['description']);
		$date = $item['date'];
	}
}
?>





