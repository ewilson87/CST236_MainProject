<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../header.php';
require_once '../../Autoloader.php';
require_once 'handlersSecurePage.php';

$dbservice = new UserBusinessService();

if (isset($_POST['userEditGroupSelect'])) {

    $userEditGroupSelect = $_POST['userEditGroupSelect'];

    if ($userEditGroupSelect == 1) {
        $_SESSION['editUser'] = true;
        header('Location: userSelectHandler.php?ID=' . $_SESSION['userSearchID']);
    } else if ($userEditGroupSelect == 2) {
        if ($dbservice->deleteUserByID($_POST['ID'])){
            $_SESSION['deleteUserSuccess'] = true;
            if ($_POST['ID'] == $_SESSION['ID']){
                session_destroy();
                header("Location: ../views/login/login.php?logout='1'");
            }
            else header('Location: userSearchHandler.php?username=' . $_SESSION['userSearch']);
        }
        else {
            // TODO add proper error and redirect
            echo "Error deleting user";
        }
    }
}

if (isset($_POST['userEditSave'])) {

    $id = $_POST['ID'];
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $accessLevel = $_POST['accessLevel'];

    // prevents admin account from removing admin access accidently
    if ($id == 2 && $_POST['accessLevel'] != 9) {
        $_SESSION['cantRemoveAdmin'] = true;
        header('Location: userSelectHandler.php?ID=' . $_SESSION['userSearchID']);
    } // if edit

    else if ($dbservice->updateUser($id, $username, $_SESSION['password'], $fname, $lname, $email, $accessLevel)) {
        $_SESSION['editUserSave'] = true;
        header('Location: userSelectHandler.php?ID=' . $_SESSION['userSearchID']);
    } else {
        // TODO add proper error and redirect
        echo "Error updating user";
    }
}