<?php
header("Access-Control-Allow-Origin: http://localhost:6006");
header("Access-Control-Allow-Origin: http://localhost:8080");
//header("Access-Control-Allow-Origin: http://192.168.1.112:8080");

//error_reporting(E_ALL | E_STRICT);
//ini_set('display_errors', 1);

require_once './app/UserDAO/UserDAOImp.php';
require_once './app/DatabaseService/MSQLIProxi.php';
require_once './app/Request/RequestImp.php';
require_once './app/Logger/Log.php';
require_once './app/Controler/SigninControler.php';

$request = new RequestImp($_GET, $_POST);

$databaseService = MSQLIProxi::getInstance();
$userDAO = new UserDAOImp($databaseService);




