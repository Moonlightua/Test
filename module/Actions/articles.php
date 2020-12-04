<?php

namespace App;

include "router.php";


$class = new ArticlesCenter();
$result = $class->getArticle();


if($result === false) {
	echo 'FATAL ERROR!';
}
