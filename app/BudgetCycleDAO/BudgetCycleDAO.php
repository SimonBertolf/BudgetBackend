<?php

interface BudgetCycleDAO {
	
	/**
	 * @param $id
	 * @return BudgetCycle
	 */
	public function findById($id);
	
	/**
	 * @param $name
	 * @return BudgetCycle
	 */
	public function findByName($name);
	
	/**
	 * @param $id
	 * @return boolean
	 */
	public function deleteById($id);
	
	/**
	 * @param $name
	 * @param $cycleMonth
	 * @param $cycleYear
	 * @return boolean
	 */
	public function create($name, $cycleMonth, $cycleYear);
	
	/**
	 * @param $id
	 * @param $name
	 * @param $cycleMonth
	 * @param $cycleYear
	 * @return boolean
	 */
	public function edit($id, $name, $cycleMonth, $cycleYear);
	
}