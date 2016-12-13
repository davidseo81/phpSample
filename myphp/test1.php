<?php

// $arr = array('1', '2', '3', '4', '5');
// print_r($arr);

$arr = array(
	'david' => 36,
	'grace' => 35,
	'jason'	=> 2
);

//print_r($arr);
//echo count($arr);

foreach ($arr as $value){
	echo $value.'</br>';
}

foreach ($arr as $key => $value){
	echo $key.' and '.$value.'<br/>';
}


