<?php

interface UserDAO {
	
	/**
	 * @param $name
	 * @return User
	 */
	public function findByName($name);
	
}