<?php
require_once './app/system/login.php';


switch($_GET['action']) {
			case 'login':
				echo '12';
				$login = new system_login();
				echo 'df';
				$login->login($_GET['name'], $_GET['pasword']);
				break;
			
			default:
				print_r('hallo du arsch');
				break;
		}
	