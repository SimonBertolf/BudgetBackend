<?php
//header("Access-Control-Allow-Origin: http://localhost:6006");
//header("Access-Control-Allow-Origin: http://localhost:8080");
header("Access-Control-Allow-Origin: http://192.168.1.112:8080");
//header("Access-Control-Allow-Origin: http://192.168.1.104");
//header("Access-Control-Allow-Origin: http://192.168.1.140");

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

require_once './app/Logger/Log.php';
require_once './app/DatabaseService/MSQLIProxi.php';
require_once './app/Request/RequestImp.php';
require_once './app/UserDAO/UserDAOImp.php';
require_once './app/BudgetDAO/BudgetDAOImp.php';
require_once './app/BudgetCycleDAO/BudgetCycleDAOImp.php';
require_once './app/BudgetTypeDAO/BudgetTypeDAOImp.php';

require_once './app/Controler/LoginControler.php';
require_once './app/Controler/SigninControler.php';
require_once './app/Controler/ShowBudgetControler.php';

$request = new RequestImp($_GET, $_POST);
$databaseService = MSQLIProxi::getInstance();
$userDAO = new UserDAOImp($databaseService);
$budgetDAO = new BudgetDAOImp($databaseService);
$budgetCycleDAO = new BudgetCycleDAOImp($databaseService);
$budgetTypeDAO = new BudgetTypeDAOImp($databaseService);

$login = new LoginControler($userDAO);
$login->handle($request);

$signin = new SigninControler($userDAO);
$signin->handle($request);

$showBudget = new ShowBudgetControler($budgetDAO, $budgetCycleDAO, $budgetTypeDAO);
$showBudget->handle($request);
