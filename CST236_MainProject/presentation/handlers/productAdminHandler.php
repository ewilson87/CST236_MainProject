<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../header.php';
require_once '../../Autoloader.php';
require_once 'handlersSecurePage.php';

if ($_SESSION['accessLevel'] == 9 || $_SESSION['ID'] == $id) {

    $dbservice = new ProductBusinessService();

    if (isset($_POST['productAdminSelect'])) {
        $inputGroupSelect = $_POST['productAdminSelect'];
        $id = $_POST['ID'];

        if ($inputGroupSelect == 1) {
            header('location: productEditHandler.php?id=' . $id);
        } else if ($inputGroupSelect == 2) {

            if ($dbservice->deleteProductByID($id)) {
                $_SESSION['deleteSuccess'] = true;
                header('Location: ProductSearchHandler.php?pattern=');
            } else {
                echo "Error deleting product.";
            }
        }
    }

    if (isset($_POST['productEditSave'])) {
        $id = $_POST['ID'];
        $carMake = $_POST['carMake'];
        $carModel = $_POST['carModel'];
        $carYear = $_POST['carYear'];
        $carVin = $_POST['carVin'];
        $carDescription = $_POST['carDescription'];
        $carPrice = $_POST['carPrice'];

        if ($dbservice->updateProduct($id, $carMake, $carModel, $carYear, $carVin, $carDescription, $carPrice)) {
            $_SESSION['editProductSave'] = true;
            header('Location: productSelectHandler.php?vin=' . $carVin);
        } else {
            echo "Error updating product";
        }
    }
} else {
    session_destroy();
    header("Location: ../views/login/login.php");
}
?>