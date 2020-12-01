<?php
require_once './app/BudgetDAO/BudgetDAO.php';

class BudgetDAOImp implements BudgetDAO {
	
	/**
	 * @var DatabaseService
	 */
	private $databaseService;
	
	public function __construct($databaseService) {
		$this->databaseService = $databaseService;
	}
	
	/**
	 * @param $id
	 * @return BudgetImp
	 */
	public function findById($id) {
//		$budget = $this->databaseService->query("SELECT * FROM budget_value LEFT JOIN budget_type ON budget_type.ID = budget_value.budget_type_id LEFT JOIN budget_cycle ON budget_cycle.ID = budget_type.budget_cycle_id WHERE budget_value.ID ='".$id."'")->fetch();
		$budget = $this->databaseService->query("SELECT * FROM budget_value WHERE ID ='".$id."'")->fetch();
		$budgetImp = new BudgetImp();
		$budgetImp->setId($budget[0]);
		$budgetImp->setBudgetTypeId($budget[1]);
		$budgetImp->setValue($budget[2]);
		$budgetImp->setUserId($budget[3]);
		return $budgetImp;
	}
	
	/**
	 * @param $id
	 * @return boolean
	 */
	public function deleteById($id) {
		$budget = $this->findById($id);
		if($budget){
			$this->databaseService->query("DELETE FROM budget_value WHERE ID ='".$id."'");
			return true;
		}
			return false;
	}
	
	/**
	 * @param $budgetTypeId
	 * @param $value
	 * @param $userId
	 * @return boolean
	 */
	public function create($budgetTypeId, $value, $userId) {
		$this->databaseService->query("INSERT INTO (Budget_value, Value, user_id) VALUES ('".$budgetTypeId."', '".$value."', '".$userId."')")->fetch();
		return true;
	}
	
	/**
	 * @param $id
	 * @param $budgetTypeId
	 * @param $value
	 * @return BudgetImp|false
	 */
	public function edit($id, $budgetTypeId, $value) {
		$budget = $this->findById($id);
		if($budget){
			$this->databaseService->query("UPDATE budget_value SET budget_type_id = '".$budgetTypeId."', Value ='".$value."' WHERE ID ='".$id."'")->fetch();
			return $budget;
		}
		return false;
	}
	
	/**
	 * @param $userId
	 * @return BudgetImp
	 */
	public function findAll($userId) {
		$budgets = $this->databaseService->query("SELECT * FROM budget_value WHERE user_id ='".$useId."'")->fetch();
		foreach($budgets as $budget){
			$budgetImp = new BudgetImp();
			$budgetImp->setId($budget[0]);
			$budgetImp->setBudgetTypeId($budget[1]);
			$budgetImp->setValue($budget[2]);
			$budgetImp->setUserId($budget[3]);
		}
		return $budgetImp;
	}
	
	/**
	 * @param $budgetTypeId
	 * @return BudgetImp
	 */
	public function findByBudgetTypeId($userId, $budgetTypeId) {
		$budgets = $this->databaseService->query("SELECT * FROM budget_value WHERE user_id ='".$useId."'AND budget_type_id ='".$budgetTypeId."'")->fetch();
		foreach($budgets as $budget){
			$budgetImp = new BudgetImp();
			$budgetImp->setId($budget[0]);
			$budgetImp->setBudgetTypeId($budget[1]);
			$budgetImp->setValue($budget[2]);
			$budgetImp->setUserId($budget[3]);
		}
		return $budgetImp;
	}
}