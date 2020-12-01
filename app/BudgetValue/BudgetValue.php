<?php

interface BudgetValue {
	public function getId();
	public function getBudgetTypeId();
	public function getValue();
	public function getUserId();
	
	public function setId($id);
	public function setBudgetTypeId($budgetTypeId);
	public function setValue($value);
	public function setUserId($userId);
}