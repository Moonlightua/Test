<?php
ob_start();
$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);
$correctlog = 'enterlog';
$correctpass = '123654789';
if($_SERVER['REQUEST_METHOD']=="POST" and !empty($login)
	and !empty($password)
	and $login == $correctlog
	and $password == $correctpass){
		header("Location: /index.php?module=Actions&page=Admin");
		exit;
			}else{
				header("Location: /index.php?module=Actions&page=login");
				exit;
			}