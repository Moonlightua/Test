<div>
	<?php
foreach($item as $items) {
		$id = $item['id'];
		$emails = $item['email'];
		$date = $item['date'];
	echo <<< msg
	<p>
		<b><a href="{$_SERVER['PHP_SELF']}?id=$id">$emails</a></b>  $date
	</p>
	<p align="right">
		<a href="{$_SERVER['PHP_SELF']}?del=$id">Delete</a>
	</p>
	msg; }
	?>
</div>



