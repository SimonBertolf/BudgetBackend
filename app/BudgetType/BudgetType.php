<?php

interface BudgetType {
	public function getId();
	public function getName();
	public function getDescription();
	public function getMinus();
	public function getCycleId();
	
	public function setId($id);
	public function setName($name);
	public function setDescription($description);
	public function setMinus($minus);
	public function setCycleId($cycleId);
}