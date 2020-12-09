<?php
require_once './app/DatabaseService/DatabaseService.php';
require_once './app/DatabaseService/MSQLIService.php';

class MSQLIProxi implements DatabaseService {
	
	/**
	 * @var MSQLIService
	 */
	private $databaseService;
	protected static $instance;
	
	protected function __construct() {
		$this->databaseService = new MSQLIService();
	}
	
	public static function getInstance() {
		if(null === self::$instance) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function query($query) {
		$this->databaseService->query($query);
		return $this->databaseService;
	}
	
	public function queryFetchAll($query) {
		$this->databaseService->queryFetchAll($query);
		return $this->databaseService;
	}
	
	public function fetch() {
		return $this->databaseService->fetch();
	}
	
	public function close() {
		$this->databaseService->close();
	}
}