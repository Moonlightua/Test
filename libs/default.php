<?php

function wtf($array, $stop=false) {
	echo '<pre>'.print_r($array,1).'</pre>';
	if(!$stop){
		exit();
	}
}

function calc($x,$y,$z="+"){
	$result=' ';
	if($z=='*'){
		$result=$x * $y;
	}	else {
		if($z == '-') {
			$result = $x - $y;
		}
		else {
			if($z == '+') {
				$result = $x + $y;
			}
			else {
				if($z == '/'and $y==0) {
					echo 'На ноль делить нельзя!';
				} else{$result = $x / $y;}
			}
		}
	}
	return $result;
}