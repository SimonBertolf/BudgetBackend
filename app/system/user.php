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
				'ID'      => $user[0],
				'Counter'   => $user[1],
				'Name'    => $user[2],
				'Pasword' => $user[3]
			);
			$this->user->updateLogins($user['id']);
			return json_encode($user);
		} else {
			return false;
		}
	}
	
	public function signin($name, $pasword) {
		$user = $this->user->checkUserByName($name);
		if($user){
			return false;
		} else{
			$this->user->create($name, $pasword);
			return $user;
		}
	}
	
}
