<?php
require_once './app/Budget/Budget.php';

class BudgetImp implements Budget {
	
	private $id;
	private $budgetTypeId;
	private $value;
	private $userId;
	private $budgetType;
	private $budgetCycle;
	
	public function getId() {
		return $this->id;
	}
	
	public function getBudgetTypeId() {
		return $this->budgetTypeId;
	}
	
	public function getValue() {
		return $this->value;
	}
	
	public function getUserId() {
		return $this->getId();
	}
	
	public function getBudgetType() {
		return $this->budgetType;
	}
	
	public function getBudgetCycle() {
		return $this->budgetCycle;
	}
	
	
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setBudgetTypeId($budgetTypeId) {
		$this->budgetTypeId = $budgetTypeId;
	}
	
	public function setValue($value) {
		$this->value = $value;
	}
	
	public function setUserId($userId) {
		$this->userId = $userId;
	}
	
	
	public function setBudgetType($budgetType) {
		$this->budgetType = $budgetType;
	}
	
	public function setBudgetCycle($budgetCycle) {
		$this->budgetCycle = $budgetCycle;
	}
}