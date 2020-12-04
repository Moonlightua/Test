<div class="articles-list">
	<a href="/index.php?module=Actions&page=Admin" class="admin-font">Admin Panel</a>	<br>
	<br>
	<br>
	<br>
	<?php
foreach($result as $items) {
		$id = $items['id'];
		$mail = $items['email'];
		$date = $items['date'];
		echo <<< msg
	<p>
	<b>$id. $mail</b> [$date]
	</p>
	<p align="right">
		<a href="http://newgeneration.com/index.php?module=Actions&page=EmailsSubs&del=$id">Delete</a>
	</p>
	<hr>
	msg; }
	?>
</div>



