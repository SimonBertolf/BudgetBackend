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
	 * @return User/false
	 */
	public function createUser($name, $pasword);
	
	/**
	 * @param $id
	 * @return boolean
	 */
	public function deleteUserById($id);
	
}