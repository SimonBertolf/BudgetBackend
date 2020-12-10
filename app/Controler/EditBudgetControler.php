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
		if($request->get('action') === $this::ACTION){
			if($this->budgetDAO->findById($request->get('id'))){
				$budget = $this->budgetDAO->findById($request->get('id'));
				$value = $budget->setValue($request->get('value'));
				$type = $budget->setBudgetType($request->get('type'));
				$cycle = $budget->setBudgetCycle($request->get('cycle'));
				$type = $this->budgetTypeDAO->findByName($type);
				$cycle = $this->budgetCycleDAO->findByName($cycle);
				$type_id = $type->getId();
				$cycle_id = $cycle->getId();
				$this->budgetDAO->edit($request->get('id'), $type_id, $value, $cycle_id);
			}
		}
		if($this->nextControler) $this->nextControler->handle($request);
	}
	
}