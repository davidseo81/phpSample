<?php
/**
 * Class Require Function
 * 
 * @author davidseo
 * 
 */

function require_class(){
	global $_CONF_PATH_LIB;
	static $__CLASS_LOADER = array();

	$args = func_get_args();
	$args_cnt = func_num_args();
	
	for($i=0;$i<$args_cnt;$i++) {
		if (in_array($args[$i],$__CLASS_LOADER)) 	continue;
		$__CLASS_LOADER[] = $args[$i];
		$path = $_CONF_PATH_LIB."/".join("/",explode(".",$args[$i]))."/".$args[$i].".php";
		
		include $path;
	}
}