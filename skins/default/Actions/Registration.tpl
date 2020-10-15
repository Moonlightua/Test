<?php
error_reporting(-1);


if(@$_POST['Ok']=='Start'){
	if(isset($_POST['login']) and isset($_POST['password']) and filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
		$_COOKIE['access']=1;
	} else {
		$_GET['exit']=1;
		echo 'Вы ввели неверний логин, пароль или е-мейл! <br>';
	}
	if($_COOKIE['access']==1){
		include 'calculator.tpl';
	}

}


?>


<form action="" method="post">
	Login:
	<input type="text" name="login">
	<br>
	Password:
	<input type="text" name="password">
	<br>
	E-mail:
	<input type="text" name="email" >
	<br>
	<div>
		<input type="submit" name="Ok" value="Start">
	</div>


</form>
































































