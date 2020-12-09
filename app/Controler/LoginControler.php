<?php
require_once './app/Controler/Controler.php';

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
		if($request->get('action') === $this::ACTION) {
			$user = $this->userDAO->findByName($request->get('name'));
			if($user) {
				if($user->getPasword() == $request->get('pasword')) {
					echo json_encode(array(
						'user'    => true,
						'pasword' => true,
					));
				} else {
					echo json_encode(array(
						'user'    => true,
						'pasword' => false,
					));
				}
			} else {
				echo json_encode(array(
					'user'    => false,
					'pasword' => false,
				));
			}
		}
		if($this->nextControler) $this->nextControler->handle($request);
	}
	
}