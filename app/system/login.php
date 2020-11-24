<?php
require_once '../database/user.php';

/**
 * Class class_login
 */
class system_login {
	
	/**
	 * @var database_user
	 */
	private $user;
	
	public function __construct() {
		$this->user = new database_user();
	}
	
	public function login($name, $pasword) {
		return $this->user->LoginUser($name, $pasword);
	}
	
}
