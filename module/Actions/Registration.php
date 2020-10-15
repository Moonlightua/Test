<?php
 error_reporting(-1);
@setcookie('access',0,time()+3600,'/');
$_COOKIE['access']=0;
@setcookie('access',0,time()-3600,'/');
if(@$_POST['Ok']=='Start'){
	if(isset($_POST['login']) and isset($_POST['password']) and filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
		$_COOKIE['access']=1;
		if($_COOKIE['access']==1){
			header("Location:/index.php?module=Actions&page=Calculator");
			exit();
		}
	} else {
		$_GET['exit']=1;
		echo 'Вы ввели неверний логин, пароль или е-мейл! <br>';
	}
}






















































