<?php

abstract class Log {
	
	/**
	 * @param $data
	 */
	public static function out($data) {
		$fp = fopen('debug.log', 'w');
		$fi = fread($fp, filesize('debug.log'));
		fwrite($fp, $fi.$data);
		fclose($fp);
	}
	
}