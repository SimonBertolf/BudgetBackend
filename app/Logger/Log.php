<?php

abstract class Log {
	
	/**
	 * @param $data
	 */
	public static function out($data) {
		$fp = fopen('debug.log', 'w');
		$fi = fread($fp, 1000);
		$res = '';
		if (is_array($data)){
			$res .= implode('=>',$data);
		}else{
			$res .= $data;
		}
		fwrite($fp, $fi.' '.$res);
		fclose($fp);
	}
	
}