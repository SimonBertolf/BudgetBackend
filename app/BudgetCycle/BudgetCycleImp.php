<?php
require_once './app/BudgetCycle/BudgetCycle.php';

class BudgetCycleImp implements BudgetCycle {
	
	private $id;
	private $name;
	private $cycleMonth;
	private $cycleYear;
	
	public function getId() {
	return $this->id;
	}
	
	public function getName() {
	return $this->name;
	}
	
	public function getCycleMonth() {
	return $this->cycleMonth;
	}
	
	public function getCycleYear() {
	return $this->cycleYear;
	}
	
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setName($name) {
	$this->name = $name;
	}
	
	public function setCycleMonth($cycleMonth) {
	$this->cycleMonth = $cycleMonth;
	}
	
	public function setCycleYear($cycleYear) {
	$this->cycleYear = $cycleYear;
	}
}