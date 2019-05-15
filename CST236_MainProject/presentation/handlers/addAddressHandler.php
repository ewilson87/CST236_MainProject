<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../header.php';
require_once '../../Autoloader.php';
require_once 'handlersSecurePage.php';

if (isset($_POST['isDefaultCheck'])){
    $isDefault = 1;
}
else {
    $isDefault = 0;
}

$address = new Address($_POST['addressType'], $isDefault, $_SESSION['ID'], $_POST['street1'], $_POST['street2'], $_POST['city'], $_POST['stateSelect'], $_POST['postalCode']);

$dbservice = new UserBusinessService();

$dbservice->addAddress($address);

$_SESSION['addressID'] = $_SESSION['ID'];

//direct to enter CC
header("Location: ../views/login/addCC.php");