<?php
require_once './app/BudgetValue/BudgetValue.php';

class BudgetValueImp implements BudgetValue {
	
	private $id;
	private $budgetTypeId;
	private $value;
	private $userId;
	
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
	return $this->userId;
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
	
	public function setUserId($useId) {
	$this->userId = $useId;
	}
}