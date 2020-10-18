<?php
include "W:\domains\\newphp.com/test/articles/lib.php";

$msgs = getMsgs();
if($msgs === false) {
	echo 'FATAL ERROR!';
}
else {
	foreach($msgs as $item) {
		$id = $item['id'];
		$name = $item['name'];
		$mail = $item['email'];
		$message = $item['message'];
		$date = $item['Date'];
	}
}







