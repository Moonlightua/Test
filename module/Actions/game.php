<?php
error_reporting(0);
session_start();

if($_SESSION['server'] <= 0) {
	header('Location: game.php?page=gameover2');
}
if($_SESSION['client'] <= 0) {
	header('Location: game.php?page=gameover1');
}

if(!isset($_SESSION['client'])) {
	$_SESSION['client'] = 20;
	$_SESSION['server'] = 20;
}

if($_POST['button'] =='Go') {
	if(isset($_POST['damage']) and $_POST['damage'] !="") {
		if($_POST['damage'] == rand(1, 3)) {
			$_SESSION['client'] = $_SESSION['client'] - rand(1, 6);
		}
		else {
			($_POST['damage'] != rand(1, 3));
			$_SESSION['server'] = $_SESSION['server'] - rand(1, 6);
		}
	}

	}

if($_SESSION['client'] <= 0) {
	session_unset();
	session_destroy();}
else {
	if($_SESSION['server'] <= 0) {
		session_unset();
		session_destroy();
	}
}
