<?php

interface DatabaseService {
	
	public function close();
	
	public function query($query);
	
	public function fetch();
}