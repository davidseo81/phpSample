<?php
/**
 * Test 뷰어
 * 
 * @author davidseo
 * @since 2016.12.14
 * 
 * @desc 
 * 호출 : http://localhost/home2/view/test_view.php
 */

require_once '../_lib/config.php';

require_class('class.Logging');
require_class('bl.Test');

global $_CONF_PATH_DATA;

$bl = Test::getInstance();
$restult = $bl->abc();
echo $result;

/*
//이렇게 쓰면 매번 인스턴스를 생성하게 되므로, 위와 같이 싱글턴으로 클래스를 호출하도록 해야한다. DB접속관련 코드에는 치명적임. 
$bl = new Test();
$restult = $bl->abc();
echo $result;
*/
