<div class="articles-list">
	<?php
foreach($result as $items) {
	$id = $items['id'];
	$title = $items['title'];
	$description = nl2br($items['description']);
	$date = $items['date'];
	echo <<< msg
	<p>
		<b><a href="http://newgeneration.com/index.php?module=Actions&page=articlesselect&id=$id">$title</a></b>
		[$date]
		<br />
	</p>
	msg; }
	?>
</div>





