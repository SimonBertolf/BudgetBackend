<?php

interface Budget {
	public function getId();
	public function getBudgetTypeId();
	public function getValue();
	public function getUserId();
	public function getBudgetType();
	public function getBudgetCycle();
	
	public function setId($id);
	public function setBudgetTypeId($budgetTypeId);
	public function setValue($value);
	public function setUserId($userId);
	public function setBudgetType($budgetType);
	public function setBudgetCycle($budgetCycle);
}