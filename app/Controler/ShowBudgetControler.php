<?php
require_once './app/Controler/Controler.php';

class ShowBudgetControler implements Controler {
	
	const ACTION = 'showbudget';
	
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
			$budget = $this->budgetDAO->findAll($this->userId);
			foreach($budget as $ke => $bu){
				$type = $this->budgetTypeDAO->findById($bu['budget_type_id']);
				$budget[$ke]['budget_type'] = $type->getName();
			}
			echo json_encode($budget);
		}
		if($this->nextControler) $this->nextControler->handle($request);
	}
	
	
}