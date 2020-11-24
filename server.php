<?php
require_once('./app/system/user.php');


switch($_GET['action']) {
	case 'login':
		$login = new system_user();
		$t = $login->login($_GET['name'], $_GET['pasword']);
		echo $t;
		break;
	
	case 'signin':
		break;
	
	default:
		print_r('hallo du arsch');
		break;
}
	