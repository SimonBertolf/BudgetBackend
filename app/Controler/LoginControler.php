<?php

class LoginControler implements Controler {
	
	const ACTION = 'login';
	
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
			$user = $this->userDAO->findByName($request->get('name'));
			if($user){
				if($user->getPasword() == $request->get('pasword')){
					print_r($request);
				}
			}
		}
		if($this->nextControler) $this->nextControler->handle($request);
	}
	
	
}