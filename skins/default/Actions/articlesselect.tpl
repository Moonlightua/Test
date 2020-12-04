<div class="articles-list">
	<?php
foreach($result as $items) {
	$id = $items['id'];
	$title = $items['Title'];
	$description = nl2br($items['Description']);
	$date = $items['Date'];
	echo <<< msg
	<p>
	<div class="article-title">$title  [$date]</div><br>
	<div class="article-text">$description</div><br>
	msg;}

	?>
</div>




