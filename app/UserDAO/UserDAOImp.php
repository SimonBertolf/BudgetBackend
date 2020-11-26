<?php
require_once './app/UserDAO/UserDAO.php';

class UserDAOImp implements UserDAO {
	
	/**
	 * @var DatabaseService
	 */
	private $databaseService;
	
	public function __construct($databaseService){
		$this->databaseService = $databaseService;
	}
	
	public function findByName($name) {
	$user =  $this->databaseService->query("SELECT * FROM user WHERE Name='".$name."'")->fetch();
	$userImp = new UserImp();
	$userImp->setName($user[2]);
	$userImp->setPasword($user[3]);
	return $userImp;
	}
	
}