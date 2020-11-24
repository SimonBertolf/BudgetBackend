<?php
error_reporting(E_ALL);
ini_set('display_errors',true);


require_once('./app/system/user.php');

echo '12';

switch($_GET['action']) {
	case 'login':
		echo '12';
		$login = new system_user();
		echo 'df';
		$login->login($_GET['name'], $_GET['pasword']);
		break;
	
	case 'signin':
		break;
	
	default:
		print_r('hallo du arsch');
		break;
}
	