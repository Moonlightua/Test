<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<meta name="description" content="Описание страницы">
	<meta name="keywords" content="Ключевые слова через запятую">
	<link href="/css/normalize.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
	<link href="/css/new.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
	<div class="top-menu">
		<DIV class="logo-text">RELAX, YOU'RE DOING FINE!</DIV>
	</div>
	<div class="head-text" id="menu">
		<a href="/">home</a>
		<a href="/index.php?module=Actions&page=Calculator">about</a>
		<a href="/index.php?module=Actions&page=form">blog</a>
		<a href="/index.php?module=Actions&page=game">contacts</a>
		<a href="/index.php?module=Actions&page=Registration"></a>
	</div>
</header>

<div id="content">

	<?php include  $_GET['module'].'/'.$_GET['page'].'.tpl'; ?>

</div>






<footer> &copy; 2020	</footer>




</body>
</html>
