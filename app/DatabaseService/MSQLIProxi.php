<?php

class MSQLIProxi implements DatabaseService {
	
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
		return $this;
	}
	
	public function fetch() {
		return $this->databaseService->fetch();
	}
	
	public function close() {
		$this->databaseService->close();
	}
}