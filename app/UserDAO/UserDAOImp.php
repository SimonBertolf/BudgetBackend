<?php
require_once './app/UserDAO/UserDAO.php';
require_once './app/User/UserImp.php';

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
	 * @return UserImp|false
	 */
	public function findByName($name) {
		$userImp = new UserImp();
		$this->databaseService->query("SELECT * FROM user WHERE Name ='" . $name . "'");
		$user = $this->databaseService->fetch();
		if($user){
			$userImp->setId($user[0][0]);
			$userImp->setCounter($user[0][1]);
			$userImp->setName($user[0][2]);
			$userImp->setPasword($user[0][3]);
			return $userImp;
		}
		return false;
	}
	
	/**
	 * @param $id
	 * @return UserImp|false
	 */
	public function findById($id) {
		$userImp = new UserImp();
		$this->databaseService->query("SELECT * FROM user WHERE ID ='" . $id . "'");
		$user = $this->databaseService->fetch();
		if($user) {
			$userImp->setId($user[0]);
			$userImp->setCounter($user[1]);
			$userImp->setName($user[2]);
			$userImp->setPasword($user[3]);
			return $userImp;
		}
		return false;
	}
	
	/**
	 * @param $name
	 * @param $pasword
	 * @return boolean
	 */
	public function create($name, $pasword){
		$user = $this->findByName($name);
		if(!$user){
			$this->databaseService->query("INSERT INTO user (Counter, Name, Pasword) VALUES (0,'" . $name . "','" . $pasword . "')");
			return true;
		}
		return false;
	}
	
	
	/**
	 * @param $id
	 * @return boolean
	 */
	public function deleteById($id) {
		$user = $this->findById($id);
		if($user){
			$this->databaseService->query("DELETE FROM user WHERE id =".$id);
			return true;
		}
		return false;
	}
}