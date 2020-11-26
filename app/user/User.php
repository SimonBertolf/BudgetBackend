<?php

interface User {
	
	public function getId();
	public function getCounter();
	public function getName();
	public function getPasword();
	
	public function setId($id);
	public function setCounter($counter);
	public function setName($name);
	public function setPasword($pasword);
}