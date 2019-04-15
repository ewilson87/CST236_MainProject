<?php
/**
 * CST-236 Main Project
 * ServerService.php version 1.0
 * Program Author: Evan Wilson
 * Date: 07 April 2019
 * The main service for interaction with the server database and is used for user authentication.
 */

require_once '../../../header.php';
require_once '../../../Autoloader.php';

// initializing variables
$username = "";
$fname    = "";
$lname    = "";
$email    = "";
$accessLevel = "";
$_SESSION['errors'] = array();
$errors = array();

//database login details obtained from GCU Hosting Solution (Heroku)
/* $host = 'us-cdbr-iron-east-03.cleardb.net';
$user = 'b5cd00b29271f8';
$dbpassword = 'd793dcc9';
$database = 'heroku_37a87dc739d8a45'; */

// connect to the database using above login details
/* $db = mysqli_connect($host, $user, $dbpassword, $database); */

$conn = new Database();

$db = $conn->getConnection();


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    
    // form validation: ensure that the form is correctly filled out
    // by adding (array_push()) corresponding error into $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($fname)) { array_push($errors, "First name is required"); }
    if (empty($lname)) { array_push($errors, "Last name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if (empty($password_2)) { array_push($errors, "Confirm password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    
    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        
        if ($user['email'] === $email) {
            array_push($errors, "That e-mail is already used");
        }
    }
    
    // Register user if there are no errors, table also creates a default current date for when all users are registered to track when they joined
    if (count($errors) == 0) {
        $password = hash('sha256', $password_1); //encrypts password before saving to database
        $query = "INSERT INTO users (username, password, fname, lname, email, accessLevel)
  			  VALUES('$username', '$password', '$fname', '$lname', '$email', 0)";
        mysqli_query($db, $query);
        //sets session variables for user for possible use in the future
        $_SESSION['username'] = $username;
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;
        $_SESSION['accessLevel'] = $accessLevel;
        $_SESSION['principle'] = TRUE;
        header('location: loginSuccess.php');
    }
    else $_SESSION['errors'] = $errors;
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if (empty($username)) {
        array_push($_SESSION['errors'], "Username is required");
    }
    if (empty($password)) {
        array_push($_SESSION['errors'], "Password is required");
    }
    
    //Currently displays user's first name upon logging in
    //Queries SQL to verify a match for username and password
    if (count($_SESSION['errors']) == 0) {
        $password = hash('sha256', $password); //encrypts password to compare to database
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        
        if (mysqli_num_rows($results) == 1) {
            $row=mysqli_fetch_array($results);
            //sets session variables for user for use later in app areas
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $username;
            $_SESSION['accessLevel'] = $row['accessLevel'];
            $_SESSION['principle'] = TRUE;
            header('location: loginSuccess.php');
        }
        else {
            $query = "SELECT * FROM users WHERE email='$username' AND password='$password'";
            $results = mysqli_query($db, $query);
            
            if (mysqli_num_rows($results) == 1) {
                $row=mysqli_fetch_array($results);
                //sets session variables for user for use later in app areas
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $username;
                $_SESSION['accessLevel'] = $row['accessLevel'];
                $_SESSION['principle'] = TRUE;
                header('location: loginSuccess.php');
            }
            else {
            $_SESSION['principle'] = FALSE;
            array_push($errors, "Wrong username/password combination");
            }
        }
    }
}