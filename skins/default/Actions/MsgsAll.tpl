<div class="articles-list">
	<?php
foreach($item as $items) {
	$id = $items['id'];
		$name = $items['name'];
		$mail = $items['email'];
		$message = nl2br($items['message']);
		$date = $items['date'];

	echo <<< msg
	<p>
	[$date] <b>$name</b> $mail
		<br />$message
	</p>
	<p align="right">
		<a href="http://newphp.com/index.php?module=Actions&page=DeleteMsg&del=$id">Delete</a>
	</p>
	msg; }
	?>
</div>



