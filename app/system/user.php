<?php
require_once './app/database/user.php';

/**
 * Class system_user
 */
class system_user {
	
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
