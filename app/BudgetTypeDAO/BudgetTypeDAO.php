<?php

interface BudgetTypeDAO {
	
	/**
	 * @param $id
	 * @return BudgetType
	 */
	public function findById($id);
	
	/**
	 * @param $name
	 * @return BudgetType
	 */
	public function findByName($name);
	
	
	/**
	 * @param $id
	 * @return boolean
	 */
	public function deleteById($id);
	
	/**
	 * @param $name
	 * @param $description
	 * @param $minus
	 * @param $cycleId
	 * @return boolean
	 */
	public function create($name, $description, $minus, $cycleId);
	
	/**
	 * @param $id
	 * @param $name
	 * @param $description
	 * @param $minus
	 * @param $cycleId
	 * @return boolean
	 */
	public function edit($id, $name, $description, $minus, $cycleId);
	
}