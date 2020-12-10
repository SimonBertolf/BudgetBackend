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
			foreach($data as $k => $d){
				if(is_array($d)){
					$res.='{';
					foreach($d as $ki => $di){
						$res .= '|'.$ki.'=>'.$di;
					}
					$res.='}'.PHP_EOL ;
				}else{
					$res .= '|'.$k.'=>'.$d.PHP_EOL;
				}
			}
		}else{
			$res .= $data;
		}
		fwrite($fp, $fi.' '.$res);
		fclose($fp);
	}
	
}