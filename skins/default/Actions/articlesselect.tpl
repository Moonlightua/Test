<div class="articles-list">
	<?php
foreach($item as $items) {
	$id = $items['id'];
	$title = $items['Title'];
	$description = nl2br($items['Description']);
	$date = $items['Date'];
	echo <<< msg
	<p>
	<b>$title</a></b>  $date
	<br />$description
	msg;}

	?>
</div>




