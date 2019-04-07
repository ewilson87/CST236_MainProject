<?php
/**
 * CST-236 Main Project
 * loginSuccess.php version 1.0
 * Program Author: Evan Wilson
 * Date: 07 April 2019
 * The page the user gets directed to after initial successful login.
 */

require_once 'header.php';
require_once 'Autoloader.php';

//only allows access to this page if logged in
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Login Failed!</title>
<!-- uses current system time in style.css call to ensure current updates without browser cache-->
<link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
<style>
<!-- Alert custom style -->
<?php include 'css/alert.css'; ?>

        #modalContainer {
            background-color: rgba(0, 0, 0, 0.3);
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            left: 0px;
            z-index: 10000;
        }

    </style>
    <div class="header">
        <a class="logo">Login Succeeded. Welcome <?php echo $_SESSION['fname'] . "!"?>!</a>
        <div class="header-right">
            <a class="active" href="login.php?logout='1'">Logout</a>
        </div>
    </div>
</head>
<body>