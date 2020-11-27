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
	 * @return boolean
	 */
	public function create($budgetTypeId, $value, $userId);
	
	/**
	 * @param $id
	 * @param $budgetTypeId
	 * @param $value
	 * @return Budget|false
	 */
	public function edit($id, $budgetTypeId, $value);
	
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