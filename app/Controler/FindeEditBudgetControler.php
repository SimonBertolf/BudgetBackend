<?php
require_once './app/Controler/Controler.php';

class FindeEditBudgetControler implements Controler {
	
	const ACTION = 'findeEditBudget';
	
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
	
	public $userId = 1;
	
	
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
			$data = array();
			if($this->budgetDAO->findById($request->get('id'))){
				$budget = $this->budgetDAO->findById($request->get('id'));
				$type = $this->budgetTypeDAO->findById($budget->getBudgetTypeId());
				$cycle = $this->budgetCycleDAO->findById($budget->getBudgetCycleId());
				Log::out($budget->getBudgetCycleId());
				$data['type'] = $type->getName();
				$data['value'] = $budget->getValue();
				$data['cycle'] = $cycle->getName();
				echo json_encode($data);
			}
		}
		if($this->nextControler) $this->nextControler->handle($request);
	}
	
}