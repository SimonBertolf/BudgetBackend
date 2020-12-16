<?php

interface BudgetDAO {
	
	/**
	 * @param $id
	 * @return Budget
	 */
	public function findById($id);
	
	/**
	 * @param $id
	 * @return Budget
	 */
	public function deleteById($id);
	
	/**
	 * @param $budgetTypeId
	 * @param $value
	 * @param $userId
	 * @param $budgetCycleId
	 * @return boolean
	 */
	public function create($budgetTypeId, $value, $userId, $budgetCycleId);
	
	/**
	 * @param $id
	 * @param $budgetTypeId
	 * @param $value
	 * @param $budgetCycleId
	 * @return Budget|false
	 */
	public function edit($id, $budgetTypeId, $value, $budgetCycleId);
	
	/**
	 * @param $userId
	 * @return Budget
	 */
	public function findAll($userId);
	
	/**
	 * @param $budgetTypeId
	 * @param $userId
	 * @return Budget
	 */
	public function findByBudgetTypeId($userId, $budgetTypeId);
	
}