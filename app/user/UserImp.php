<?php
require_once './app/User/User.php';

class UserImp implements User {
	
	private $name;
	private $pasword;
	
	public function getName() {
		return $this->name;
	}
	
	public function getPasword() {
		return $this->pasword;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	public function setPasword($pasword) {
		$this->pasword = $pasword;
	}
}