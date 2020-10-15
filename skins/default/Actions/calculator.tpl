<form action="" name="form1" method="post">
	Число 1:
		<input type="text" name="textfield1" id="textfield1" value="">
		<br>
	Число 2:
		<input type="text" name="textfield2" id="textfield2" value="">
	<div>
	Знак:
	<label>+<input type="radio" name="Знак" id="textfield3" value="+"></label>|
	<label>-<input type="radio" name="Знак" id="textfield3"  value="-"></label>|
	<label>/<input type="radio" name="Знак" id="textfield3"  value="/"></label>|
	<label>*<input type="radio" name="Знак" id="textfield3"  value="*"></label>|
	</div>
		<input type="submit" name="button" id="button" value="Go">
	<div><b>Ответ:</b> <?php echo $res;?></div>
</form>


