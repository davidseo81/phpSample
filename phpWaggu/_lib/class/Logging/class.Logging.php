<?php
/**
* Logging Class
*
* @author KBS미디어 (whtiebee@kbsmedia.co.kr)
* @since 2015.09.08
*/

/*
사용예제:
	include "common/class.Logging.php";
	
	$log = new Logging(); //로깅클래스 Instance 생성
	$log->chk_start(); //로깅 시작시간 기록
	$log->obj = "메시지~~"; //로그용 저장메시지
        ...
        프로그램실행
        ...
	$log->write($log->obj,"[DIV:구분용]");
*/
class Logging {
	var $log_stime = 0.0; //로깅시작시간
	var $log_file_path; //로그파일경로
	var $log_file_name = "";
	var $obj; //내부 임의 보관객체

	//Singleton
	function &getInstance() {
		static $instance = null;
		if ($instance == null) {
			$instance = new Logging();
		}
		//$instance->init();
		return $instance;
	}
	
	function Logging() {
		global $_CONF_PATH_LOG;
		
		$this->log_stime = 0.0;
		
		if ($_CONF_PATH_LOG) $this->log_file_path = $_CONF_PATH_LOG."/"; //로그폴더
		else $this->log_file_path = $_SERVER['DOCUMENT_ROOT']."/logs/"; //끝에 슬래시 필수
		
	}
	
	//공통
	function microtime_float() { //Get Unixtime with microseconds
		$arr = explode(" ",microtime());
		$ret = $arr[1]+$arr[0];
		return $ret;
	}
	
	function writeToFile($path,$contents,$mode='a') { //파일기록
		$fp = @fopen($path,$mode);
		if ($fp) {
			//if (flock($fp, LOCK_EX)) {
				fwrite($fp,$contents,strlen($contents));
			//	flock($fp, LOCK_UN);
			//}
			fclose($fp);
			return true;
		} else return false;
	}
	
	function clear_start() {
		$this->log_stime = 0.0;
	}
	
	function chk_start() { //시작시간 저장
		return $this->log_stime = $this->microtime_float();
	}
	
	function chk_end() { //걸린시간(초, 현재시간-기록된시간)  리턴
		if ($this->log_stime == 0.0) return 0;
		$log_etime = $this->microtime_float();
		return $log_etime - $this->log_stime;
	}
	
	function getLogMsg($msg,$div = '') { //로그메시지
		$ip = getenv('REMOTE_ADDR');
		
		if ($this->log_stime > 0.0) $time = '[SEC:'. round($this->chk_end(),3).']';
		
		$res = $div.'[TIME:'.date("Y/m/d H:i:s").'][IP:'.$ip.']'.$time.'['.$msg.']'; //메시지포맷
		$res.= "\r\n"; //엔터 추가
		return $res;
	}
	
	function getLogFilePath($mode='') { //로그파일 경로 몇 파일명 리턴 //$mode값 0:PATH+FILE 1:FILE
		$file_name = "log_".date("Ymd").'_'.getenv('SERVER_ADDR').".log"; //파일명
		if (!$mode) return $this->log_file_path.$file_name;
		else return $file_name;
	}
	
	//로그기록 Action
	function write($msg,$div = '') { //메세지, 호출자IP, 구분자
		return $this->writeToFile($this->getLogFilePath(),$this->getLogMSg($msg,$div),'a'); //로그 추가기록
	}

}

