<?php
require_once './app/BudgetCycleDAO/BudgetCycleDAO.php';
require_once './app/BudgetCycle/BudgetCycleImp.php';

class BudgetCycleDAOImp implements BudgetCycleDAO {
	
	/**
	 * @var DatabaseService
	 */
	private $databaseService;
	
	public function __construct($databaseService) {
		$this->databaseService = $databaseService;
	}
	
	/**
	 * @param $id
	 * @return BudgetCycleImp
	 */
	public function findById($id) {
		$this->databaseService->query("SELECT * FROM budget_cycle WHERE ID ='".$id."'");
		$budgetCycle = $this->databaseService->fetch();
		$budgetCycleImp = new BudgetCycleImp();
		$budgetCycleImp->setId($budgetCycle[0][0]);
		$budgetCycleImp->setName($budgetCycle[0][1]);
		$budgetCycleImp->setCycleMonth($budgetCycle[0][2]);
		$budgetCycleImp->setCycleYear($budgetCycle[0][3]);
		return $budgetCycleImp;
	}
	
	/**
	 * @param $name
	 * @return BudgetCycleImp
	 */
	public function findByName($name) {
		$this->databaseService->query("SELECT * FROM budget_cycle WHERE Name ='".$name."'");
		$budgetCycle = $this->databaseService->fetch();
		$budgetCycleImp = new BudgetCycleImp();
		$budgetCycleImp->setId($budgetCycle[0][0]);
		$budgetCycleImp->setName($budgetCycle[0][1]);
		$budgetCycleImp->setCycleMonth($budgetCycle[0][2]);
		$budgetCycleImp->setCycleYear($budgetCycle[0][3]);
		return $budgetCycleImp;
	}
	
	/**
	 * @param $id
	 * @return boolean
	 */
	public function deleteById($id) {
		$budgetCycle = $this->findById($id);
		if($budgetCycle){
			$this->databaseService->query("DELETE FROM budget_cycle WHERE ID ='".$id."'");
			return true;
		}
		return false;
	}
	
	/**
	 * @param $name
	 * @param $cycleMonth
	 * @param $cycleYear
	 * @return bool
	 */
	public function create($name, $cycleMonth, $cycleYear) {
		$this->databaseService->query("INSERT INTO budget_cycle (Name, Cycle_Month, Cycle_Year) VALUES ('".$name."','".$cycleMonth."','".$cycleYear."')");
		return true;
	}
	
	/**
	 * @param $id
	 * @param $name
	 * @param $cycleMonth
	 * @param $cycleYear
	 * @return bool
	 */
	public function edit($id, $name, $cycleMonth, $cycleYear) {
		$budgetCycle = $this->findById($id);
		if($budgetCycle){
			$this->databaseService->query("UPDATE budget_cycle SET Name = '".$name."', Cycle_Month = '".$cycleMonth."', Cycle_Year = '".$cycleYear."') ");
		return true;
		}
		return false;
	}
}