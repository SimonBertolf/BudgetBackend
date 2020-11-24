<?php
require_once '../database/user.php';

/**
 * Class class_login
 */
class class_login {
	private $name;
	private $pasword;
	
	private function login($name, $pasword) {
		$user = new database_user();
		return $user->LoginUser($name, $pasword);
	}
	
}