<div class="message-list">
	<a href="/index.php?module=Actions&page=Admin" class="admin-font">Admin Panel</a>	<br>
	<br>
	<br>
	<br>
	<?php
foreach($result as $items) {
	$id = $items['id'];
		$name = $items['name'];
		$mail = $items['email'];
		$message = nl2br($items['message']);
		$date = $items['date'];

	echo <<< msg
	<p>
	[$date] <b>$name</b> $mail<br>
		<br />$message
	</p>
	<p align="right">
		<a href="http://newgeneration.com/index.php?module=Actions&page=MsgsAll&del=$id">Delete</a>
	</p>
	msg; }
	?>
</div>



