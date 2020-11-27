<?php

interface UserDAO {
	
	/**
	 * @param $name
	 * @return User
	 */
	public function findByName($name);
	
	/**
	 * @param $id
	 * @return User
	 */
	public function findById($id);
	
	/**
	 * @param $name
	 * @param $pasword
	 * @return boolean
	 */
	public function create($name, $pasword);
	
	/**
	 * @param $id
	 * @return boolean
	 */
	public function deleteById($id);
	
}