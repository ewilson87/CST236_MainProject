<?php
/**
 * CST-236 Main Project
 * login.php version 1.0
 * Program Author: Evan Wilson
 * Date: 07 April 2019
 * Starting page of application. Here the user can login, or select register new account.
 */

require_once 'header.php';
require_once 'Autoloader.php';

require_once 'ServerService.php';

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Milestone 1 login page</title>
    <!-- uses current system time in style.css call to ensure current updates without browser cache-->
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
</head>
<body>
<div class="header">
    <a href="#default" class="logo">Login to CST-236 Main Project</a>
    <div class="header-right">
        <a class="active" href="register.php">Sign Up</a>
    </div>
</div>

<form method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div class="flex-container">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" required="true">
        </div>
    </div>
    <div class="flex-container">
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required="true">
        </div>
    </div>
    <div class="flex-container">
        <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
        </div>
    </div>
</form>

</body>
</html>