<?php
require_once './app/Controler/Controler.php';

class DeleteBudgetControler implements Controler {
	
	const ACTION = 'deleteBudgetvalue';
	
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
			if($this->budgetDAO->findById($request->get('id'))){
				$this->budgetDAO->deleteById($request->get('id'));
			}
		}
		if($this->nextControler) $this->nextControler->handle($request);
	}
	
}