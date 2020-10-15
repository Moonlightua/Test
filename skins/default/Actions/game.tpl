<?php
error_reporting(0);

if(isset($_GET['page'])){

} else {

}


echo 'Player:'.' '.$_SESSION['client'].'<br>';
echo 'Computer:'.' '.$_SESSION['server'].'<br>';


?>



<form action="" method="POST">
	Число (1-3):
	<input type="text" name="damage" value="">
	<div>
		<input type="submit" name="button" value="Go">
	</div>

</form>

<?php include $_GET['page'].'.php'; ?>