<?php
include "lib.php";

$result = getArticleList();

if($result === false){
echo 'FATAL ERROR!';
}else{
foreach($result as $item){
	$id = $item['id'];
	$title = $item['title'];
	$description = nl2br($item['description']);
	$date = $item['date'];
	}
}
foreach($item as $items){
	$id = $items['id'];
	$title = $items['title'];
	$description = nl2br($items['description']);
	$date = $items['date'];
	echo <<< msg
<hr>
<p>
        <b><a href="{$_SERVER['PHP_SELF']}?id=$id">$title</a></b>  $date
        <br />$description
    </p>
    <p align="right">
        <a href="{$_SERVER['PHP_SELF']}?del=$id">Удалить</a>
    </p>
msg;

}

