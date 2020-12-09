<?php
require_once './app/DatabaseService/DatabaseService.php';

class MSQLIService implements DatabaseService {
	// User Daten
	private $host = '192.168.1.140';
	private $user = 'root';
	private $pw = '';
	private $db = 'Budgetrechner';
	
	/**
	 * @var mysqli $mysql
	 */
	private $mysql;
	
	/**
	 * @var MSQLIService $query
	 */
	private $query;
	
	public function __construct() {
		$this->mysql = new mysqli($this->host, $this->user, $this->pw, $this->db);
	}
	
	public function close(){
		$this->mysql->close();
	}
	
	public function query($query) {
		$this->query = $this->mysql->query($query);
		return $this->query;
	}
	
	 public function queryFetchAll($query) {
		$this->query = $this->mysql->query($query)->fetch_all();
		return $this->query;
	}
	
	public function fetch() {
		return $this->query->fetch_all();
	}
}