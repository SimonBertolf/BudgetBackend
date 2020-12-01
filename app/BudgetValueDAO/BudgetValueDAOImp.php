<?php
require_once './app/BudgetValueDAO/BudgetValueDAO.php';

class BudgetValueDAOImp implements BudgetValueDAO {
	
	/**
	 * @var DatabaseService
	 */
	private $databaseService;
	
	public function __construct($databaseService) {
		$this->databaseService = $databaseService;
	}
	
	/**
	 * @param $id
	 * @return BudgetValueImp
	 */
	public function findById($id) {
		$budgetValue = $this->databaseService->query("SELECT * FROM budget_value WHERE ID ='".$id."'")->fetch();
		$budgetValueImp = new BudgetValueImp();
		$budgetValueImp->setId($budgetValue[0]);
		$budgetValueImp->setBudgetTypeId($budgetValue[1]);
		$budgetValueImp->setValue($budgetValue[2]);
		$budgetValueImp->setUserId($budgetValue[3]);
		return $budgetValueImp;
	}
	
	/**
	 * @param $userId
	 * @return BudgetValueImp
	 */
	public function findByUserId($userId) {
		$budgetValue = $this->databaseService->query("SELECT * FROM budget_value WHERE user_id ='".$userId."'")->fetch();
		$budgetValueImp = new BudgetValueImp();
		$budgetValueImp->setId($budgetValue[0]);
		$budgetValueImp->setBudgetTypeId($budgetValue[1]);
		$budgetValueImp->setValue($budgetValue[2]);
		$budgetValueImp->setUserId($budgetValue[3]);
		return $budgetValueImp;
	}
	
	/**
	 * @param $userId
	 * @param $budgetTypeId
	 * @return BudgetValueImp
	 */
	public function findByBudgetTypeId($userId, $budgetTypeId) {
		$budgetValue = $this->databaseService->query("SELECT * FROM budget_value WHERE budget_type_id ='".$budgetTypeId."' AND user_id = '".$userId."'")->fetch();
		$budgetValueImp = new BudgetValueImp();
		$budgetValueImp->setId($budgetValue[0]);
		$budgetValueImp->setBudgetTypeId($budgetValue[1]);
		$budgetValueImp->setValue($budgetValue[2]);
		$budgetValueImp->setUserId($budgetValue[3]);
		return $budgetValueImp;
	}
	
	/**
	 * @param $id
	 * @return bool
	 */
	public function deleteById($id) {
		$budgetValue = $this->findById($id);
		if($budgetValue){
			$this->databaseService->query("DELETE FROM budget_value WHERE ID ='".$id."'");
			return true;
		}
		return false;
	}
	
	/**
	 * @param $budgetTypeId
	 * @param $value
	 * @param $userId
	 * @return bool
	 */
	public function create($budgetTypeId, $value, $userId) {
		$this->databaseService->query("INSERT INTO budget_value (budget_type_id, Value, user_id) VALUES ('".$budgetTypeId."','".$value."','".$userId."')");
		return true;
	}
	
	/**
	 * @param $id
	 * @param $budgetTypeId
	 * @param $value
	 * @param $userId
	 * @return bool
	 */
	public function edit($id, $budgetTypeId, $value, $userId) {
		$budgetValue = $this->findById($id);
		if($budgetValue){
			$this->databaseService->query("UPDATE budget_Value SET budget_type_id = '".$budgetTypeId."', Value = '".$value."', user_id = '".$userId."') ");
		return true;
		}
		return false;
	}
}