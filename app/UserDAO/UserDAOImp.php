<?php
require_once './app/UserDAO/UserDAO.php';

class UserDAOImp implements UserDAO {
	
	/**
	 * @var DatabaseService
	 */
	private $databaseService;
	
	public function __construct($databaseService) {
		$this->databaseService = $databaseService;
	}
	
	/**
	 * @param $name
	 * @return UserImp
	 */
	public function findByName($name) {
		$user = $this->databaseService->query("SELECT * FROM user WHERE Name='" . $name . "'")->fetch();
		$userImp = new UserImp();
		$userImp->setId($user[0]);
		$userImp->setCounter($user[1]);
		$userImp->setName($user[2]);
		$userImp->setPasword($user[3]);
		return $userImp;
	}
	
	/**
	 * @param $id
	 * @return UserImp
	 */
	public function findById($id) {
		$user = $this->databaseService->query("SELECT * FROM user WHERE ID='" . $id . "'")->fetch();
		$userImp = new UserImp();
		$userImp->setId($user[0]);
		$userImp->setCounter($user[1]);
		$userImp->setName($user[2]);
		$userImp->setPasword($user[3]);
		return $userImp;
	}
	
	/**
	 * @param $name
	 * @param $pasword
	 * @return UserImp|false
	 */
	public function createUser($name, $pasword){
		$user = $this->findByName($name);
		if($user){
			return false;
		}else {
			$userNew = $this->databaseService->query("INSERT INTO user (Counter, Name, Pasword) VALUES (0,'" . $name . "','" . $pasword . "')")->fetch();
			$userImp = new UserImp();
			$userImp->setId($userNew[0]);
			$userImp->setCounter($userNew[1]);
			$userImp->setName($userNew[2]);
			$userImp->setPasword($userNew[3]);
			return $userImp;
		}
	}
	
	
	/**
	 * @param $id
	 * @return bool
	 */
	public function deleteUserById($id) {
		$user = $this->findById($id);
		if($user){
			$this->databaseService->query("DELETE FROM user WHERE id =".$id);
			return true;
		}else{
			return false;
		}
	}
}