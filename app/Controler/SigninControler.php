<?php
require_once './app/Controler/Controler.php';

class SigninControler implements Controler {
	
	const ACTION = 'signin';
	
	/**
	 * @var Controler
	 */
	private $nextControler;
	/**
	 * @var UserDAO
	 */
	private $userDAO;
	
	public function __construct($userDAO) {
		$this->nextControler = null;
		$this->userDAO = $userDAO;
	}
	
	public function setNext($controler) {
		$this->nextControler = $controler;
	}
	
	/**
	 * @param $request Request
	 */
	public function handle($request) {
		if($request->get('action') === $this::ACTION){
			$user = $this->userDAO->createUser($request['name'],$request['pasword']);
			if($user){
				print_r($request);
			}else{
				print_r($request);
			}
		}
		if($this->nextControler) $this->nextControler->handle($request);
	}
	
	
}