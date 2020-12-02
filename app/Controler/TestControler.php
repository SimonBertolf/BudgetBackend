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
		Log::out('dgkjadsögadsögdaölkhöädalhklkd');
		if($request->get('action') === $this::ACTION){
				$data = array('arschloch'=>122);
				echo json_encode($data);
		}
		if($this->nextControler) $this->nextControler->handle($request);
	}
	
	
}