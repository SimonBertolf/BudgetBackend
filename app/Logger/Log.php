<?php

abstract class Log {
	
	/**
	 * @param $data
	 */
	public static function out($data) {
		file_put_contents('debug.d', $data);
	}
	
}