<?php
error_reporting(0);
		if(isset($_POST['textfield1'],$_POST['textfield2'])and $_POST['textfield1']!=="" and $_POST['textfield2']!=="" and filter_var($_POST['textfield1'],FILTER_VALIDATE_FLOAT)and filter_var($_POST['textfield2'],FILTER_VALIDATE_FLOAT) ) {
			if($_POST['button'] == "Go") {
				$res = calc($_POST['textfield1'], $_POST['textfield2'], $_POST['Знак']);
			} else {

			}
		}
