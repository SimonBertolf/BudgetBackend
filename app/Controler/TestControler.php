<?php
require_once './app/Controler/Controler.php';

class TestControler implements Controler {
	
	const ACTION = 'test';
	
	/**
	 * @var Controler
	 */
	private $nextControler;
	
	public function __construct() {
		$this->nextControler = null;
	}
	
	public function setNext($controler) {
		$this->nextControler = $controler;
	}
	
	/**
	 * @param $request Request
	 */
	public function handle($request) {
		if($request->get('action') === $this::ACTION){
			Log::out('Test du hurensohn');
			return 'arschloch';
		}
		if($this->nextControler) $this->nextControler->handle($request);
	}
	
	
}