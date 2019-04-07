<?php
require_once 'header.php';
require_once 'Autoloader.php';

$attempedLoginName = $_POST['username'];
$attempedLoginPassword = $_POST['password'];

$securityService = new SecurityService($attempedLoginName, $attempedLoginPassword);

$loggedIn = $securityService->validateLogin();

if ($loggedIn){
    $_SESSION['principle'] = true;
    $_SESSION['username'] = $attempedLoginName;
    include "loginSuccess.php";
}
else {
    $_SESSION['principle'] = false;
    include "loginFailed.php";
}