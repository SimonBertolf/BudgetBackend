<?php
header("Access-Control-Allow-Origin: http://localhost:6006");
require_once './app/UserDAO/UserDAOImp.php';
require_once './app/DatabaseService/MSQLIProxi.php';
require_once './app/Request/RequestImp.php';

$request = new RequestImp($_GET, $_POST);

$databaseService = MSQLIProxi::getInstance();
$userDAO = new UserDAOImp($databaseService);
