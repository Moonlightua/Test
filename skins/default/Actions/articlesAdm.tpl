<a href="/index.php?module=Actions&page=Admin" class="admin-font">Admin Panel</a>	<br>
<?php
foreach($result as $items) {
$id = $items['id'];
$title = $items['title'];
$description = nl2br($items['description']);
$date = $items['date'];
echo <<< msg
<div class="articles-list">
	<p>
<p style="font-size:25px"><a href="http://newgeneration.com/index.php?module=Actions&page=articlesselect&id=$id">$title</a>  [$date]</p>
		<br />$description
	</p>
	<p align="right">
		<a href="http://newgeneration.com/index.php?module=Actions&page=articlesAdm&del=$id">Delete</a>
	</p>
	<hr>
</div>
msg;
}
