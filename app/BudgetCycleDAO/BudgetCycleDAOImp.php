<?php
require_once './app/BudgetCycleDAO/BudgetCycleDAO.php';

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
		$budgetCycle = $this->databaseService->query("SELECT * FROM budget_cycle WHERE ID ='".$id."'")->fetch();
		$budgetCycleImp = new BudgetCycleImp();
		$budgetCycleImp->setId($budgetCycle[0]);
		$budgetCycleImp->setName($budgetCycle[1]);
		$budgetCycleImp->setCycleMonth($budgetCycle[2]);
		$budgetCycleImp->setCycleYear($budgetCycle[3]);
		return $budgetCycleImp;
	}
	
	/**
	 * @param $id
	 * @return bool
	 */
	public function deleteById($id) {
		$budgetCycle = $this->findById($id);
		if($budgetCycle){
			$this->databaseService->query("DELETE FROM budget_cycle WHERE id ='".$id."'");
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