<?php
include "W:\domains\\newphp.com/test/articles/lib.php";

$em = getEmails();

if($em === false) {
	echo 'FATAL ERROR!';
}
else {
	foreach($em as $item) {
		$id = $item['id'];
		$mails = $item['email'];
		$date = $item['Date'];
	}
}
