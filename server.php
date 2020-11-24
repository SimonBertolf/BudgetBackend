<?php
require_once './app/database/user.php';

$action = $_GET['action'];

switch ($action){
	
	case 'LoginUser':
		echo '12';
		$user = new database_user();
		echo 'df';
		$user->LoginUser($_GET['name'],$_GET['pasword']);
		break;
		
	default:
		print_r('hallo du arsch');
		break;
}