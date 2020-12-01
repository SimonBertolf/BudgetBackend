<?php

interface BudgetCycle {
	public function getId();
	public function getName();
	public function getCycleMonth();
	public function getCycleYear();
	
	public function setId($id);
	public function setName($name);
	public function setCycleMonth($cycleMonth);
	public function setCycleYear($cycleYear);
}