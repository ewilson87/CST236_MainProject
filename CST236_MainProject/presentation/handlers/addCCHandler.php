<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../header.php';
require_once '../../Autoloader.php';
require_once 'handlersSecurePage.php';

$ccType = $_POST['ccType'];
$ccNumber = $_POST['ccNumber'];
$expMonth = $_POST['expMonthSelect'];
$expYear = $_POST['expYearSelect'];
$ccCCV = $_POST['ccCCV'];

$dbservice = new UserBusinessService();

if (isset($_POST['ccEditSave'])){ //edditing current CC
    $dbservice->editCC($_SESSION['ID'], $ccType, $ccNumber, $expMonth, $expYear, $ccCCV);
    header("Location: userSelectHandler.php?ID=" . $_SESSION['ID']);
}
else { //creating new CC
$dbservice->addCC($_SESSION['ID'], $ccType, $ccNumber, $expMonth, $expYear, $ccCCV);

//direct to login success
header("Location: ../views/login/loginSuccess.php");
}