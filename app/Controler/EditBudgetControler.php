<?php
require_once './app/Controler/Controler.php';

class EditBudgetControler implements Controler {
	
	const ACTION = 'editBudget';
	
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
			if($this->budgetDAO->findById($request['id']))
			$this->budgetDAO->edit($request['id'],$request['budgetTypeId'],$request['value']);
		}
		if($this->nextControler) $this->nextControler->handle($request);
	}
	
}