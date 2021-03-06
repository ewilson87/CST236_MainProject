<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../header.php';
require_once '../../Autoloader.php';
require_once 'handlersSecurePage.php';

$dbservice = new UserBusinessService();

if (isset($_GET['cart']) && $_GET['cart'] = true){
    
    $user = $dbservice->findByID($_SESSION['ID']);
   
    
    //if address not completed
    if($user[0]['street1'] == "" || $user[0]['street1'] == NULL || $user[0]['city'] == "" || $user[0]['city'] == NULL ||
        $user[0]['state'] == "" || $user[0]['state'] == NULL || $user[0]['postalCode'] == "" || $user[0]['postalCode'] == NULL){
            $_SESSION['editFailReason'] = "Please verify address from account controls first.";
            header("Location: cartHandler.php");
    }
    
    //if no CC on file
    if (!$dbservice->findCCByID($_SESSION['ID'])){
        $_SESSION['editFailReason'] = "Please set your credit card from account controls first.";
        header("Location: cartHandler.php?viewCart=true");
    }
    else {
        if (isset($_GET['discountCode'])){
            $discountCode = $_GET['discountCode'];
            if (strlen($discountCode) > 0){
                $discount = $dbservice->getDiscount($discountCode);
                if ($discount){
                    if ($discount[0]['discountPercent'] < 10){
                    $discountPercent = "0.0" . $discount[0]['discountPercent'];
                    }
                    else $discountPercent = "0." . $discount[0]['discountPercent'];
                    $_SESSION['discountUsed'] = $discountPercent; //used for proper navigation
                    $_SESSION['discountPercent'] = $discount[0]['discountPercent']; //used for percent value added to DB
                    $_SESSION['discountCode'] = $discount[0]['discountCodes'];
                    $_SESSION['total'] = round($_SESSION['total'] * (1 - ($discountPercent)), 2);
                }
                else {
                    $_SESSION['editFailReason'] = "Invalid coupon code";
                }
            }
        }
        
        $cc = $dbservice->findCCByID($_SESSION['ID']);
        header("Location: displayCheckout.php");
    }
}

if (isset($_POST['payConfirmed'])){
    $cart = $dbservice->getCartByUserID($_SESSION['ID']);
    $productIDs = array();
    for ($x = 0; $x < count((array) $cart); $x ++) {
        array_push($productIDs, $cart[$x]['ID']);
    } 
    $_SESSION['test'] = implode(",", $productIDs);
    if ($dbservice->completeSaleTransaction($_SESSION['ID'], $_SESSION['addressID'], $productIDs, $_SESSION['total'], 
        $_SESSION['totalCount'], $_SESSION['discountPercent'], $_SESSION['discountCode'])){
            $_SESSION['purchaseSuccess'] = true;
            header("Location: displayOrders.php");
    }
    else {
        //direct to failure notification
        echo "Something went wrong, please try again.";
    }
    
}