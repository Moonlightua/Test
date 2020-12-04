<?php

namespace App;

require_once "router.php";

$class = new ArticlesCenter();
$result = $class->getArticleList();


if($result === false){
echo 'FATAL ERROR!';
}else {
	foreach($result as $items) {
		$id = $items['id'];
		$title = $items['title'];
		$date = $items['date'];
		echo <<< msg
<p>
        <b><a href="/index.php?module=Actions&page=articlesselect&id=$id">$title</a></b>  $date
 <hr>
    </p>
msg;
	}
}
?>



