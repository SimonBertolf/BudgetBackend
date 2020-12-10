<?php
require_once './app/BudgetType/BudgetType.php';

class BudgetTypeImp implements BudgetType {
	
	private $id;
	private $name;
	private $description;
	private $minus;
	
	public function getId() {
	return $this->id;
	}
	
	public function getName() {
	return $this->name;
	}
	
	public function getDescription() {
	return $this->description;
	}
	
	public function getMinus() {
	return $this->minus;
	}
	
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setName($name) {
	$this->name = $name;
	}
	
	public function setDescription($description) {
	$this->description = $description;
	}
	
	public function setMinus($minus) {
	$this->minus = $minus;
	}
}