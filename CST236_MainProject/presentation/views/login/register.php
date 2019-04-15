<?php
/**
 * CST-236 Main Project
 * register.php version 1.0
 * Program Author: Evan Wilson
 * Date: 07 April 2019
 * Here the user can register a new account. Error reporting if the user doesn't enter a value in every box or
 * if username/email is already used.
 */


require_once '..\\..\\..\\header.php';
require_once '..\\..\\..\\Autoloader.php';

require_once '..\\..\\..\\businessService\\ServerService.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
    <title>Register New User Account</title>
    <!-- uses current system time in style.css call to ensure current updates without browser cache-->
    <link rel="stylesheet" type="text/css" href="../../css/style.css?<?php echo time(); ?>">
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
        <a class="logo">Register New User Account</a>
        <div class="header-right">
            <a class="active" href="login.php">Sign In</a>
        </div>
    </div>
</head>
<body>

<!-- Basic input options, use flex-containers and input-groups for display formatting -->
<form method="post" action="register.php">
<?php include('errors.php'); ?>
    <div class="flex-container">
        <div class="input-group">
            <label>First Name</label>
            <input type="text" name="fname" value="<?php echo $fname; ?>" required="true">
        </div>
        <div class="input-group">
            <label>Last Name</label>
            <input type="text" name="lname" value="<?php echo $lname; ?>" required="true">
        </div>
    </div>
    <div class="flex-container">
        <div class="input-group">
            <label>Username</label>
            <input
                    class="text" id="text"
                    type="text" name="username" value="<?php echo $username; ?>" required="true">
        </div>
        <div class="input-group">
            <label>E-mail</label>
            <input type="email" name="email" value="<?php echo $email; ?>" required="true">
        </div>
    </div>
    <div class="flex-container">
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1" required="true">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2" required="true">
        </div>
    </div>
    <div class="flex-container">
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
    </div>

</form>
</body>
</html>