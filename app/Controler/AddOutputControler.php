<?php
require_once './app/Controler/Controler.php';

class AddOutputControler implements Controler {
	
	const ACTION = 'addOutput';
	
	//Wird später über die Session Abgefangen
	private $userid = 1;
	
	/**
	 * @var Controler
	 */
	private $nextControler;
	/**
	 * @var BudgetDAO
	 */
	private $budgetDAO;
	
	public function __construct($budgetDAO) {
		$this->nextControler = null;
		$this->budgetDAO = $budgetDAO;
	}
	
	public function setNext($controler) {
		$this->nextControler = $controler;
	}
	
	/**
	 * @param $request Request
	 */
	public function handle($request) {
		if($request->get('action') === $this::ACTION){
			$usage = $request['usage'];
			$value = $request['value'];
			return $this->budgetDAO->create($usage, $value, $this->userid);
		}
		if($this->nextControler) $this->nextControler->handle($request);
	}
	
}