<div>
	<?php
foreach($item as $items) {
	$id = $items['id'];
	$title = $items['title'];
	$description = nl2br($items['description']);
	$date = $items['date'];
	echo <<< msg
	<p>
		<b><a href="{$_SERVER['PHP_SELF']}?id=$id">$title</a></b>  $date
		<br />$description
	</p>
	<p align="right">
		<a href="{$_SERVER['PHP_SELF']}?del=$id">Delete</a>
	</p>
	msg; }
	?>
</div>



