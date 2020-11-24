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
		$user = $this->user->loginUser($name, $pasword);
		if($user) {
			$user = array(
				'id'      => $user[0],
				'count'   => $user[1],
				'name'    => $user[2],
				'pasword' => $user[3]
			);
			$this->user->updateLogins($user['id']);
			return $user;
		} else {
			return 'Wrong Pasword or Name';
		}
	}
	
	public function signin($name, $pasword) {
		$user = $this->user->checkUserByName($name);
		if($user){
			return 'User Exist';
		} else{
			$this->user->create($name, $pasword);
			return $user;
		}
	}
	
}
