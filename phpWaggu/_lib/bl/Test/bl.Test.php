<?php
/**
 * Test class
 * 
 * @author davidseo
 */
set_time_limit(300); //최대 5분

require_class('class.Logging');

class Test{

//Singleton - 이건 php4 버젼
// 	function &getInstance(){
// 		static $instance = null;
// 		if($instance == null){
// 			$instance == new self();
// 		}
// 		return $instance;
// 	}
	
	//Singleton - php5 이상일때, 
	private static $_instance = null;
	
	public static function getInstance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	//생성자
	function __construct(){
	}
	
	//에러메세지 로깅처리
	function error($error_msg){
		$log = Logging::getInstance();
		$log->write($error_msg);
	}
	
	//크론탭실행시 실행 메쏘드 묶음
	function process_data(){
		
	}
	
	//테스트로 실행할 메쏘드
	function abc(){
		return 'abc';
	}
	
}