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
		if($request->get('action') === $this::ACTION) {
			$user = $this->userDAO->create($request->get('name'), $request->get('pasword'));
			if($user) {
				echo json_encode(array('create' => true));
			} else {
				echo json_encode(array('create' => false));
			}
		}
		if($this->nextControler) $this->nextControler->handle($request);
	}
}