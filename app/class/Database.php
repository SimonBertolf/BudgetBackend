<?php
/**
 * Class class_database
 * Verbindung zur Datenbank
 */
class class_database {
	// User Daten
	private $host = '192.168.1.140';
	private $user = 'root';
	private $pw = '';
	private $db = 'Budgetrechner';
	public $mysql;
	
	public function __construct() {
		// -------- Verbindungsaufbau --------
		$this->mysql = new mysqli($this->host, $this->user, $this->pw, $this->db);
		
		// -------- Fehleranalyse --------
		if($this->mysql === false) {
			die('Connection Error' . $this->mysql->connect_error);
		} elseif($this->mysql->connect_error) {
			die('Error' . $this->mysql->connect_error);
		}
	}
	
	public function close_connection() {
		// -------- Verbindung trennen --------
		$this->mysql->close();
	}
	
}
