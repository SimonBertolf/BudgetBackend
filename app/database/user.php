<?php
include_once './app/config/database.php';

/**
 * Class database_user
 * User Tabelle und ihre funktionen
 */
class database_user {
	
	/**
	 * @var config_database
	 */
	private $db;
	
	public function __construct() {
		$this->db = new config_database();
	}
	
	public function loginUser($name, $pasword) {
		return ($this->db->mysql->query("SELECT * FROM user WHERE Name ='" . $name . "' AND Pasword ='" . $pasword . "'"))->fetch_row();
	}
	
	public function updateLogins($id) {
		$this->db->mysql->query("UPDATE user SET Counter = Counter + 1 WHERE ID =" . $id);
	}
	
	public function checkUserByName($name){
		return($this->db->mysql->query("SELECT * FROM user WHERE Name ='".$name."'"))->fetch_row();
	}
	
	public function create($name, $pasword) {
		$this->db->mysql->query("INSERT INTO user (Counter, Name, Pasword) VALUE (0,'" . $name . "','" . $pasword . "')");
	}
	
}