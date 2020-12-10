<?php
require_once './app/BudgetTypeDAO/BudgetTypeDAO.php';
require_once './app/BudgetType/BudgetTypeImp.php';

class BudgetTypeDAOImp implements BudgetTypeDAO {
	
	/**
	 * @var DatabaseService
	 */
	private $databaseService;
	
	public function __construct($databaseService) {
		$this->databaseService = $databaseService;
	}
	
	public function findById($id) {
		$this->databaseService->query("SELECT * FROM budget_type WHERE ID = '".$id."'");
		$budgetType = $this->databaseService->fetch();
		$budgetTypeImp = new BudgetTypeImp();
		$budgetTypeImp->setId($budgetType[0][0]);
		$budgetTypeImp->setName($budgetType[0][1]);
		$budgetTypeImp->setDescription($budgetType[0][2]);
		$budgetTypeImp->setMinus($budgetType[0][3]);
		return $budgetTypeImp;
	}
	
	public function findByName($name) {
		$budgetType = $this->databaseService->query("SELECT * FROM budget_type WHERE Name = '".$name."'");
		$budgetTypeImp = new BudgetTypeImp();
		$budgetTypeImp->setId($budgetType[0]);
		$budgetTypeImp->setName($budgetType[1]);
		$budgetTypeImp->setDescription($budgetType[2]);
		$budgetTypeImp->setMinus($budgetType[3]);
		$budgetTypeImp->setCycleId($budgetType[4]);
		return $budgetTypeImp;
	}
	
	public function deleteById($id) {
		$budgetType = $this->findById($id);
		if($budgetType){
			$this->databaseService->query("DELETE FROM budget_type WHERE ID ='".$id."'");
			return true;
		}
		return false;
	}
	
	public function create($name, $description, $minus, $cycleId) {
		$this->databaseService->query("INSERT INTO budget_type (Name, Description, Minus, budget_cycle_id) VALUES ('".$name."', '".$description."', '".$minus."', '".$cycleId."')");
		return true;
	}
	
	public function edit($id, $name, $description, $minus, $cycleId) {
		$budgetType = $this->findById($id);
		if($budgetType){
			$this->databaseService->query("UPDATE budget_type SET Name = '".$name."', Description = '".$description."', Minus = '".$minus."', budget_cycle_id = '".$cycleId."'");
			return true;
		}
		return false;
	}
}