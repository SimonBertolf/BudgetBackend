<?php

interface Controler {

	public function setNext($controler);
	
	public function handle($request);
	
}