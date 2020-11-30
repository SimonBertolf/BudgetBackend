<?php
require_once './app/BudgetTypeDAO/BudgetTypeDAO.php';

class BudgetTypeDAOImp implements BudgetTypeDAO {
	
	/**
	 * @var DatabaseService
	 */
	private $databaseService;
	
	public function __construct($databaseService) {
		$this->databaseService = $databaseService;
	}
	
	public function findById($id) {
		$budgetType = $this->databaseService->query("SELECT * FROM budget_type WHERE ID ='".$id."'")->fetch();
		$budgetTypeImp = new BudgetTypeImp();
		$budgetTypeImp->setId($budgetType[0]);
		$budgetTypeImp->setName($budgetType[1]);
		$budgetTypeImp->setDescription($budgetType[2]);
		$budgetTypeImp->setMinus($budgetType[3]);
		$budgetTypeImp->setCycleId($budgetType[4]);
		return $budgetTypeImp;
	}
	
	public function findByName($name) {
		$budgetType = $this->databaseService->query("SELECT * FROM budget_type WHERE Name ='".$name."'")->fetch();
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
			$this->databaseService->query("DELETE FROM budget_type WHERE id ='".$id."'");
		}
	}
	
	public function create($name, $description, $minus, $cycleId) {
		// TODO: Implement create() method.
	}
	
	public function edit($id, $name, $description, $minus, $cycleId) {
		// TODO: Implement edit() method.
	}
}