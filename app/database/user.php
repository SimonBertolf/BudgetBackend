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
	
		public function LoginUser($name, $pasword) {
			$user = $this->db->mysql->query("SELECT * FROM user WHERE Name ='" . $name . "' AND Pasword ='" . $pasword . "'")
															->fetch_row();
			header("Content-type: application/json; charset=utf-8");
			if($user) {
				$user = array('id' => $user[0],'count' => $user[1], 'name' => $user[2], 'pasword' => $user[3]);
				return json_encode($user);
			} else {
				return false;
			}
		}
}