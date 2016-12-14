<?php
/**
 * Config 파일
 * 
 * @author davidseo
 * @since 2016.12.14
 * @
 */

error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 1);

include_once 'class/require_class.php';

//글로벌 선언 (모든페이지에서 공통적으로 사용될 변수선언)
global $_CONF_PATH_ROOT;
global $_CONF_PATH_LIB;

$_CONF_PATH_LIB = '/Users/davidseo/Documents/git/home2/_lib/';
