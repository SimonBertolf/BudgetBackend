<?php
require_once './app/Controler/Controler.php';

class AddNewBudgetControler implements Controler {
	
	const ACTION = 'addNewBudget';
	
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
	
	/**
	 * @var BudgetCycleDAO
	 */
	private $budgetCycleDAO;
	
	/**
	 * @var BudgetTypeDAO
	 */
	private $budgetTypeDAO;
	
	public function __construct($budgetDAO, $budgetCycleDAO, $budgetTypeDAO) {
		$this->nextControler = null;
		$this->budgetDAO = $budgetDAO;
		$this->budgetCycleDAO = $budgetCycleDAO;
		$this->budgetTypeDAO = $budgetTypeDAO;
	}
	
	public function setNext($controler) {
		$this->nextControler = $controler;
	}
	
	/**
	 * @param $request Request
	 */
	public function handle($request) {
		if($request->get('action') === $this::ACTION) {
			$typen = $request->get('type');
			$cyclen = $request->get('cycle');
			$amount = $request->get('amount');
			$type = $this->budgetTypeDAO->findByName($typen);
			$cycle = $this->budgetCycleDAO->findByName($cyclen);
			$type_id = $type->getId();
			$cycle_id = $cycle->getId();
			$this->budgetDAO->create($type_id, $amount, $this->userid, $cycle_id);
		}
		if($this->nextControler) $this->nextControler->handle($request);
	}
	
}