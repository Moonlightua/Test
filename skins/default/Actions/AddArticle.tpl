<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<meta name="description" content="Описание страницы">
	<meta name="keywords" content="Ключевые слова через запятую">
	<link href="/css/normalize.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
	<link href="/css/new.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
	<div class="top-menu">
		<div class="logo-text"><a href="/" style="color:black;text-decoration:none;border:none">RELAX, YOU'RE DOING FINE!</a></div>
		<div class="textunderlogo">Life Advice That Doesn't Suck</div>
	</div>
	<div class="admin-links" id="menu">
		<a href="/">home</a><br>
		<a href="/index.php?module=Actions&page=articles">blog</a><br>
		<a href="/index.php?module=Actions&page=MsgsAll">messages</a><br>
		<a href="/index.php?module=Actions&page=EmailsSubs">emails</a><br>
	</div>
</header>
<div id="content">
	<?php include "W:\domains\\newgeneration.com/Test/Articles/addArticles.php";?>
</div>
<footer class="foot">
	<div class="foot-text2">
		<a href="/" style="color:white;text-decoration:none">RELAX, YOU'RE DOING FINE!</a>
	</div>
	<div class="foot-text3">People have difficulties embracing their inner spirituality<br> because everyday stressors get the best of them; finding peace and happiness<br>in the little joys of life can seem difficult, results do not seem all that gratifying.<br>
	</div>
	<div class="foot-text">
		<hr style="height:0.1px;border-width:0;color:white;background-color:white">
		&copy; 2020 Keep Calm Group , INC. ALL RIGHTS RESERVED
	</div>
</footer>
</body>
</html>
