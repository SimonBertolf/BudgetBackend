<?php
require_once './app/BudgetDAO/BudgetDAO.php';
require_once './app/Budget/BudgetImp.php';

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
		$this->databaseService->query("SELECT * FROM budget_value WHERE ID ='".$id."'");
		$budget = $this->databaseService->fetch();
		$budgetImp = new BudgetImp();
		$budgetImp->setId($budget[0][0]);
		$budgetImp->setBudgetTypeId($budget[0][1]);
		$budgetImp->setValue($budget[0][2]);
		$budgetImp->setUserId($budget[0][3]);
		$budgetImp->setBudgetCycleId($budget[0][4]);
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
	 * @param $budgetCycleId
	 * @return boolean
	 */
	public function create($budgetTypeId, $value, $userId, $budgetCycleId) {
		$this->databaseService->query("INSERT INTO budget_value (budget_type_id, Value, user_id, budget_cycle_id) VALUES ('".$budgetTypeId."', '".$value."', '".$userId."', '".$budgetCycleId."')");
		return true;
	}
	
	/**
	 * @param $id
	 * @param $budgetTypeId
	 * @param $value
	 * @param $budgetCycleId
	 * @return BudgetImp|false
	 */
	public function edit($id, $budgetTypeId, $value, $budgetCycleId) {
		$budget = $this->findById($id);
		if($budget){
			$this->databaseService->query("UPDATE budget_value SET budget_type_id = '".$budgetTypeId."', Value ='".$value."', budget_cycle_id ='".$budgetCycleId."' WHERE ID ='".$id."'");
			return $budget;
		}
		return false;
	}
	
	/**
	 * @param $userId
	 * @return array
	 */
	public function findAll($userId) {
		$this->databaseService->query("SELECT ID, budget_type_id, Value, user_id, budget_cycle_id FROM budget_value WHERE user_id ='".$userId."'");
		$budgets = $this->databaseService->fetch();
		$res = array();
		foreach($budgets as $budget){
			$res[$budget[0]]['ID'] = $budget[0];
			$res[$budget[0]]['budget_type_id'] = $budget[1];
			$res[$budget[0]]['Value'] = $budget[2];
			$res[$budget[0]]['user_id'] = $budget[3];
			$res[$budget[0]]['budget_cycle_id'] = $budget[4];
		}
		return $res;
	}
	
	/**
	 * @param $userId
	 * @param $budgetTypeId
	 * @return BudgetImp
	 */
	public function findByBudgetTypeId($userId, $budgetTypeId) {
		$this->databaseService->query("SELECT * FROM budget_value WHERE user_id ='".$userId."'AND budget_type_id ='".$budgetTypeId."'");
		$budgets = $this->databaseService->fetch();
		foreach($budgets as $budget){
			$budgetImp = new BudgetImp();
			$budgetImp->setId($budget[][0]);
			$budgetImp->setBudgetTypeId($budget[0][1]);
			$budgetImp->setValue($budget[0][2]);
			$budgetImp->setUserId($budget[0][3]);
		}
		return $budgetImp;
	}
}