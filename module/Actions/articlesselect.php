<?php

use App\ArticlesCenter;

require_once "router.php";

$id = (int)$_GET['id'];
$class = new ArticlesCenter();
$result = $class->selectArticle($id);


?>



