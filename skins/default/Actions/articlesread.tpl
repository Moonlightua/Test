<div class="articles-list">
	<?php
foreach($item as $items) {
	$id = $items['id'];
	$title = $items['title'];
	$description = nl2br($items['description']);
	$date = $items['date'];
	echo <<< msg
	<p>
	<b>$title</a></b>  $date
	<br />$description
	msg; }
	?>
</div>




