<?php
include_once '../class/Database.php';

/**
 * Class database_user
 * User Tabelle und ihre funktionen
 */
class database_user  {
	
	/**
	 * @var class_database
	 */
		private $db;
		
		public function __construct() {
			$this->db = new class_database();
		}
	
	public function LoginUser($name, $pasword) {
		$user = $this->db->mysql->query("SELECT * FROM user WHERE Name ='" . $name . "' AND Pasword ='" . $pasword . "'")
											->fetch_row();
		header("Content-type: application/json; charset=utf-8");
		if($user) {
			$user = array('id' => $user[0],'count' => $user[1], 'name' => $user[2], 'pasword' => $user[3]);
			echo json_encode($user);
		} else {
			echo json_encode(array('mesage'=>'Falsche Name oder Passwort'));
		}
	}
	
}