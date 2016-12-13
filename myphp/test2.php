<?php
class user{
	public $username;
	public $email;
	public $password;
	
	public function __construct($username, $password){
		$this->username = $username;
		$this->password = $password;
	}
	
	public function __destruct(){
		
	}
	
}