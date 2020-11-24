<?php
require_once('./app/system/user.php');


switch($_GET['action']) {
	case 'login':
		$login = new system_user();
		$t = $login->login($_GET['name'], $_GET['pasword']);
		print_r ($t);
		break;
	
	case 'signin':
		$signin = new system_user();
		$t = $signin->signin($_GET['name'], $_GET['pasword']);
		print_r ($t);
		break;
	
	default:
		print_r('hallo du arsch');
		break;
}
	