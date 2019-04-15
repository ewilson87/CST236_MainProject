<?php
/**
 * CST-236 Main Project
 * loginSuccess.php version 1.0
 * Program Author: Evan Wilson
 * Date: 07 April 2019
 * The page the user gets directed to after initial successful login.
 */

require_once '../../../header.php';
require_once '../../../Autoloader.php';
require_once 'securePage.php';

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Login Success!</title>
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
        <a class="logo">Login Succeeded. Welcome <?php echo $_SESSION['fname'] . "!"?>!</a>
        <div class="header-right">
            <a class="active" href="login.php?logout='1'">Logout</a>
        </div>
    </div>
</head>
<body>
<br><br>

<!-- TODO: Make so only admin see this -->
<form action = "../../../presentation/handlers/userSearchHandler.php">
<div class="flex-container">
    <div class="input-group">
		<label>Search for a user</label>
		<input type="text" name="username"></input>
	</div>
</div>
<div class="flex-container">
    <div class="input-group">
		<input type="submit" value="Search"></input>
	</div>
</div>
</form>
<br><br>
<form action = "../../../presentation/handlers/ProductSearchHandler.php">
<div class="flex-container">
    <div class="input-group">
		<label>Search for a car by make or model</label>
		<input type="text" name="pattern"></input>
	</div>
</div>
<div class="flex-container">
    <div class="input-group">
		<input type="submit" value="Search"></input>
	</div>
</div>
</form>

</body>
</html>