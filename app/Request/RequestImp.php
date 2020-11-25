<?php

class RequestImp implements Request {
	
	private $params;
	
	public function __construct($get,$post){
		$this->params = array_merge($get, $post);
	}
	
	public function get($key) {
		return $this->params[$key];
	}
}