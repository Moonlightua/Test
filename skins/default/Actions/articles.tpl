<div class="articles-list">
	<?php
foreach($item as $items) {
	$id = $items['id'];
	$title = $items['title'];
	$description = nl2br($items['description']);
	$date = $items['date'];
	echo <<< msg
	<p>
		<b><a href="http://newphp.com/index.php?module=Actions&page=articlesselect&id=$id">$title</a></b>  $date
		<br />$description
	</p>
	<p align="right">
		<a href="http://newphp.com/index.php?module=Actions&page=DeleteArticle&del=$id">Delete</a>
	</p>
	msg; }
	?>
</div>




