<?php
/**
 * CST-236 Main Project
 * loginFailed.php version 1.0
 * Program Author: Evan Wilson
 * Date: 07 April 2019
 * This page is not currently used with the error reporting done on login page, but leaving for possible future use.
 */

require_once 'header.php';
require_once 'Autoloader.php';

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
        <a class="logo">Login Failed!</a>
        <div class="header-right">
            <a class="active" href="login.php">Retry</a>
            <a class="active" href="register.php">Register</a>
        </div>
    </div>
</head>
<body>