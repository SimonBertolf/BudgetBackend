<?php
require_once './app/User/User.php';

class UserImp implements User {
	
	private $id;
	private $counter;
	private $name;
	private $pasword;
	
	public function getId() {
		return $this->id;
	}
	
	public function getCounter() {
		return $this->counter;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getPasword() {
		return $this->pasword;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setCounter($counter) {
	$this->counter = $counter;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	public function setPasword($pasword) {
		$this->pasword = $pasword;
	}
}