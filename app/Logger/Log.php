<?php
abstract class Log {
	public static function out($data) {
		file_put_contents('debug.d',$data);
	}
}