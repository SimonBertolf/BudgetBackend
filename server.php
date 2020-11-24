<?php
require_once './app/database/user.php';
$action = $_GET['action'];

switch ($action){
	case 'LoginUser':
		$controler = new database_user();
		echo 'w';
		$controler->LoginUser($_GET['name'],$_GET['pasword']);
		break;
}