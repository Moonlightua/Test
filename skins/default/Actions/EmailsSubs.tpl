<div class="articles-list">
	<?php
foreach($item as $items) {
		$id = $items['id'];
		$mail = $items['email'];
		$date = $items['date'];
		echo <<< msg
	<p>
	<b>$id. $mail</b> [$date]
	</p>
	<p align="right">
		<a href="http://newphp.com/index.php?module=Actions&page=DeleteEmails&del=$id">Delete</a>
	</p>
	<hr>
	msg; }
	?>
</div>



