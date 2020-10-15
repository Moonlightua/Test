<b><?php
if (isset($_POST['Login'],$_POST['Password'])and $_POST['Login']!=='' and $_POST['Password']!=='' )
{
	echo 'Done';
}

?></b> <br>
<form action="" method="post">
	<div>Login: <input type="text" name="Login"</div>
	<div>Password: <input type="password" name="Password"</div>
	<div>
		Gender:<br>
		<label>	Male <input type="radio" name="gender" value="M"></label> |
		<label>Female <input type="radio" name="gender" value="F"></label>
	</div>
	<div>
		Age:<br>
		<label>0 - 18 <input type="radio" name="age" value="0-18"></label> |
		<label>18+ <input type="radio" name="age" value="18+"></label>
	</div>
	<div><input type="submit" name="submit" value="Go"</div>
</form>

