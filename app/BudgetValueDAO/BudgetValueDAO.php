<?php

interface BudgetValueDAO {
	
	/**
	 * @param $id
	 * @return BudgetValue
	 */
	public function findById($id);
	
	/**
	 * @param $userId
	 * @return BudgetValue
	 */
	public function findByUserId($userId);
	
	/**
	 * @param $userId
	 * @param $budgetTypeId
	 * @return BudgetValue
	 */
	public function findByBudgetTypeId($userId, $budgetTypeId);
	
	/**
	 * @param $id
	 * @return boolean
	 */
	public function deleteById($id);
	
	/**
	 * @param $budgetTypeId
	 * @param $value
	 * @param $userId
	 * @return boolean
	 */
	public function create($budgetTypeId, $value, $userId);
	
	/**
	 * @param $id
	 * @param $name
	 * @param $cycleMonth
	 * @param $cycleYear
	 * @return boolean
	 */
	public function edit($id, $budgetTypeId, $value, $userId);
	
}