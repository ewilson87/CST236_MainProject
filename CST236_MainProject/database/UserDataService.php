<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../header.php';

// fixes autoloader issue when accessing Database from here instead of from ServerService. Do not yet know what's causing this issue.
$_SESSION['uds'] = true;

require_once '../../Autoloader.php';

class UserDataService implements JsonSerializable
{
    private $conn;
    
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }
    
    public function jsonSerialize(){
        return get_object_vars($this);
    }

    public function findByFirstName($pattern)
    { // delete if not used later
        $mysqli = $this->conn;

        $query = $mysqli->prepare("SELECT * FROM users WHERE fname LIKE ?");

        // bind parameters for markers
        $like_pattern = "%" . $pattern . "%";

        $query->bind_param('s', $like_pattern);

        // execute query
        $query->execute();

        // get results
        $result = $query->get_result();

        if (! $result) {
            echo "Error in the SQL statement";
            return NULL;
            exit();
        }

        if ($result->num_rows == 0) {
            return NULL;
        } else {
            $index = 0;
            $users_array = array();

            while ($row = $result->fetch_assoc()) {
                $users_array[$index] = array(
                    $row["ID"],
                    $row["username"],
                    ($row["fname"] . " " . $row['lname'])
                );
                $index ++;
            }

            // frees result set and closes connection
            $result->free();
            $mysqli->close();

            if (count($users_array) > 0)
                return $users_array;
            return NULL;
        }
    }

    public function findByUsername($pattern)
    {
        $conn = $this->conn;

        $stmt = $conn->prepare("SELECT * FROM users LEFT JOIN addresses on users.ID = addresses.addressID WHERE username LIKE ?");

        if (! $stmt) {
            echo "Something is wrong in the binding process. SQL Error?";
            exit();
        }

        // bind params
        $like_pattern = "%" . $pattern . "%";
        $stmt->bind_param('s', $like_pattern);

        // execute query
        $stmt->execute();

        // get results
        $result = $stmt->get_result();

        if (! $result) {
            echo "Error in the SQL statement";
            return NULL;
            exit();
        }

        if ($result->num_rows == 0) {
            return NULL;
        } else {
            $users_array = array();

            while ($user = $result->fetch_assoc()) {
                array_push($users_array, $user);
            }
            return $users_array;
        }
    }

    public function findByID($id)
    {
        $conn = $this->conn;

        $stmt = $conn->prepare("SELECT * FROM users LEFT JOIN addresses on users.ID = addresses.addressID WHERE ID = ?");

        // bind params
        $stmt->bind_param('i', $id);

        // execute query
        $stmt->execute();

        // get results
        $result = $stmt->get_result();

        if (! $result) {
            echo "Error in the SQL statement";
            return NULL;
            exit();
        }

        if ($result->num_rows == 0) {
            return NULL;
        } else {
            $users_array = array();

            while ($user = $result->fetch_assoc()) {
                array_push($users_array, $user);
            }
            return $users_array;
        }
    }

    public function updateUser($id, $username, $password, $fname, $lname, $email, $accessLevel)
    {
        $connection = $this->conn;

        // first check the database to make sure
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($connection, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            $_SESSION['editFailReason'] = "That e-mail is already used.";
            return false;
        } 
        else {

            $stmt = $connection->prepare("UPDATE users SET
                                        password = ?,
                                        fname = ?,
                                        lname = ?,
                                        email = ?,
                                        accessLevel = ?
                                    WHERE ID = ?
                                    AND username = ?"); // Helps prevent unauthorized changes by injecting just known username or ID, by making changes have to match both
                                                        // i.e. users only know their username, not corresponding ID, and can't update random ID without knowing the username
                                                        // it belongs to

            if (! $stmt) {
                echo "Something is wrong in the binding process. SQL Error?";
                exit();
            }

            // bind params
            $stmt->bind_param('ssssiis', $password, $fname, $lname, $email, $accessLevel, $id, $username);

            // execute query
            if ($stmt->execute()) {
                return true;
            } else {
                
                return false;
                // TODO
            }
        }
    }

    public function deleteUserByID($id)
    {
        $connection = $this->conn;
        $stmt = $connection->prepare("DELETE FROM users WHERE ID = ?");

        if (! $stmt) {
            echo "Something is wrong in the binding process. SQL Error?";
            exit();
        }

        // bind params
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error deleting User from database";
            return false;
            // TODO
        }
    }

    public function addAddress($Address)
    {
        $connection = $this->conn;

        $addressType = mysqli_real_escape_string($connection, $Address->getAddressType());
        $isDefault = mysqli_real_escape_string($connection, $Address->getIsDefault());
        $userID = mysqli_real_escape_string($connection, $Address->getUserID());
        $street1 = mysqli_real_escape_string($connection, $Address->getStreet1());
        $street2 = mysqli_real_escape_string($connection, $Address->getStreet2());
        $city = mysqli_real_escape_string($connection, $Address->getCity());
        $state = mysqli_real_escape_string($connection, $Address->getState());
        $postalCode = mysqli_real_escape_string($connection, $Address->getPostalCode());

        $stmt = "INSERT INTO addresses (addressID, addressType, isDefault, userID, street1, street2, city, state, postalCode)
  			  VALUES('$userID', '$addressType', '$isDefault', '$userID', '$street1', '$street2', '$city', '$state', '$postalCode')";

        
        if (mysqli_query($connection, $stmt)) {
        return true;
        }
        else {
         return false;   
        }
    }

    public function editAddress($Address)
    {
        $connection = $this->conn;

        $addressType = mysqli_real_escape_string($connection, $Address->getAddressType());
        $isDefault = mysqli_real_escape_string($connection, $Address->getIsDefault());
        $street1 = mysqli_real_escape_string($connection, $Address->getStreet1());
        $street2 = mysqli_real_escape_string($connection, $Address->getStreet2());
        $city = mysqli_real_escape_string($connection, $Address->getCity());
        $state = mysqli_real_escape_string($connection, $Address->getState());
        $postalCode = mysqli_real_escape_string($connection, $Address->getPostalCode());
        $ID = $_POST['ID'];

        $stmt = "UPDATE addresses
                 SET 
                    addressType = '$addressType', isDefault = '$isDefault', street1 = '$street1', street2 = '$street2', city = '$city', state = '$state', postalCode = '$postalCode'
                 WHERE 
                    userID = '$ID'";
        
        $connection->query($stmt);

        if ($connection->affected_rows == 1) {
            return true;
        }
        else {
            return $this->addAddress($Address);
        }
    }

    public function addToCart($userID, $addressID, $productID)
    {
        if (strlen($addressID) <= 0 || $addressID == NULL){
            $_SESSION['editFailReason'] = "Cannot add items to cart before entering valid address.";
            return false;
        }
        
        $connection = $this->conn;

        $stmt = "SELECT * FROM cart WHERE userID ='$userID' AND productID = '$productID'";
        $result = mysqli_query($connection, $stmt);
        $cart = mysqli_fetch_assoc($result);

        if ($cart) { // if that user already has that product in cart
            $_SESSION['editFailReason'] = "That item is already in your cart.";
            return false;
        } else {
            $stmt = "INSERT INTO cart (userID, addressID, productID) VALUES ('$userID', '$addressID', '$productID')";
            mysqli_query($connection, $stmt);

            return true;
        }
    }

    public function getCartByUserID($userID)
    {
        $conn = $this->conn;

        $stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products on cart.productID = products.ID WHERE userID = ?");

        // bind params
        $stmt->bind_param('i', $userID);

        // execute query
        $stmt->execute();

        // get results
        $result = $stmt->get_result();

        if (! $result) {
            echo "Error in the SQL statement";
            return NULL;
            exit();
        }

        if ($result->num_rows == 0) {
            return NULL;
        } else {
            $cart_array = array();

            while ($cart = $result->fetch_assoc()) {
                array_push($cart_array, $cart);
            }
            return $cart_array;
        }
    }

    public function removeFromCart($userID, $productID)
    {
        $connection = $this->conn;
        $stmt = $connection->prepare("DELETE FROM cart WHERE userID = ? AND productID = ?");

        if (! $stmt) {
            echo "Something is wrong in the binding process. SQL Error?";
            exit();
        }

        // bind params
        $stmt->bind_param('ii', $userID, $productID);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error deleting User from database";
            return false;
            // TODO
        }
    }
    
    public function addCC($userID, $ccType, $ccNumber, $expMonth, $expYear, $ccCCV){
        $connection = $this->conn;
        
        $userID = mysqli_real_escape_string($connection, $userID);
        $ccType = mysqli_real_escape_string($connection, $ccType);
        $ccNumber = mysqli_real_escape_string($connection, $ccNumber);
        $expMonth = mysqli_real_escape_string($connection, $expMonth);
        $expYear = mysqli_real_escape_string($connection, $expYear);
        $ccCCV = mysqli_real_escape_string($connection, $ccCCV);

        
        $stmt = "INSERT INTO credit_cards (userID, ccNumber, ccType, ccMonth, ccYear, ccCCV)
  			  VALUES('$userID', '$ccNumber', '$ccType', '$expMonth', '$expYear', '$ccCCV')";
        
        
        if (mysqli_query($connection, $stmt)) {
            return true;
        }
        else {
            return false;
        }
    }
    
    public function editCC($userID, $ccType, $ccNumber, $expMonth, $expYear, $ccCCV)
    {
        $connection = $this->conn;
        
        $userID = mysqli_real_escape_string($connection, $userID);
        $ccType = mysqli_real_escape_string($connection, $ccType);
        $ccNumber = mysqli_real_escape_string($connection, $ccNumber);
        $expMonth = mysqli_real_escape_string($connection, $expMonth);
        $expYear = mysqli_real_escape_string($connection, $expYear);
        $ccCCV = mysqli_real_escape_string($connection, $ccCCV);
        
        $stmt = "UPDATE credit_cards
                 SET
                    ccType = '$ccType', ccNumber = '$ccNumber', ccMonth = '$expMonth', ccYear = '$expYear', ccCCV = '$ccCCV'
                 WHERE
                    userID = '$userID'";
        
        $connection->query($stmt);
        
        if ($connection->affected_rows == 1) {
            return true;
        }
        else {
            return $this->addCC($userID, $ccType, $ccNumber, $expMonth, $expYear, $ccCCV);
        }
    }
    
    public function findCCByID($id){
        $conn = $this->conn;
        
        $stmt = $conn->prepare("SELECT * FROM credit_cards WHERE userID = ?");
        
        // bind params
        $stmt->bind_param('i', $id);
        
        // execute query
        $stmt->execute();
        
        // get results
        $result = $stmt->get_result();
        
        if (! $result) {
            echo "Error in the SQL statement";
            return NULL;
            exit();
        }
        
        if ($result->num_rows == 0) {
            return FALSE;
        } else {
            $users_array = array();
            
            while ($user = $result->fetch_assoc()) {
                array_push($users_array, $user);
            }
            return $users_array;
        }
        
    }
    
    public function processPayment(){
        //fake function that simulates processing payment, hard coded return true
        return true;
    }
    
    public function markAsSold($productIDs){
        $conn = $this->conn;
        
        $comma_separated = implode(",", $productIDs);
        
        $stmt = $conn->prepare("UPDATE products SET sold = 1 WHERE ID IN ($comma_separated)");
        
        if (!$stmt){
            echo "Something is wrong in the binding process. SQL Error in marking sold?";
            exit;
        }
        
        if ($stmt->execute()){
            return true;
        }
        else {
            echo "Error updating products to sold in database";
            return false;
            //TODO
        }
    }
    
    public function createOrder($userID, $addressID, $total, $count, $discount){        
        $conn = $this->conn;
        
        $userID = mysqli_real_escape_string($conn, $userID);
        $addressID = mysqli_real_escape_string($conn, $addressID);
        
        $stmt = "INSERT INTO orders (userID, AddressID, totalProducts, totalPrice, discountUsed) 
                 VALUES('$userID', '$addressID', '$count', '$total', '$discount')";
        
        if (mysqli_query($conn, $stmt)) {
            return true;
        }
        else {
            return false;
        }
    }
    
    public function getMostRecentOrderID($userID){      
        $conn = $this->conn;
        
        $userID = mysqli_real_escape_string($conn, $userID);
        
        $stmt = $conn->prepare("SELECT * FROM orders WHERE userID = ? ORDER BY timestamp DESC LIMIT 1");
        // bind params
        $stmt->bind_param('i', $userID);
        
        // execute query
        $stmt->execute();
        
        // get results
        $result = $stmt->get_result();
        
        if (! $result) {
            echo "Error in the SQL statement";
            return NULL;
            exit();
        }
        
        if ($result->num_rows == 0) {
            return NULL;
        } else {
            $ordersArray = array();
            
            while ($order = $result->fetch_assoc()) {
                array_push($ordersArray, $order);
            }
            
            $orderId = $ordersArray[0]['ordersID'];
           
            return $orderId;
        }
    }
    
    public function createOrderDetails($orderID, $productIDs){
        $conn = $this->conn;
        
        $values = array();
        foreach($productIDs as $ID){
            $values[] = "('{$ID}', '{$orderID}')";
        }
        
        $values = implode(", ", $values);
        
        $stmt = "INSERT INTO order_details (productID, orderID) VALUES  {$values}" ;
        
        if (mysqli_query($conn, $stmt)) {
            return true;
        }
        else {
            return false;
        }
    }

    public function updateCartsRemoveSold(){
        $conn = $this->conn;
        
        $stmt = $conn->prepare("DELETE cart FROM cart LEFT JOIN products on cart.productID = products.ID WHERE products.sold = 1");

        if (! $stmt) {
            echo "Something is wrong in the binding process. SQL Error?";
            exit();
        }
        
        $stmt->execute(); 
        
        return true;
    }
    
    public function completeSaleTransaction($userID, $addressID, $productIDs, $total, $count, $discount, $discountCode){
        //ATOMIC transaction process       
        $conn = $this->conn;
        $conn->autocommit(FALSE);
        $conn->begin_transaction();
        
        //hard coded to return true
        $paymentSuccess = $this->processPayment();
        
        $orderSuccess = $this->createOrder($userID, $addressID, $total, $count, $discount);
        
        $orderID = $this->getMostRecentOrderID($userID);
        
        $orderDetails = $this->createOrderDetails($orderID, $productIDs);
        
        $markAsSold = $this->markAsSold($productIDs);
        
        $removeUsedDiscount = $this->removeUsedDiscount($discountCode);
        
        $updateCart = $this->updateCartsRemoveSold();      
        
        if ($paymentSuccess == true && $orderSuccess == true && $orderDetails == true && $markAsSold ==true && $updateCart == true
            && $removeUsedDiscount == true){
            $conn->commit();
            $_SESSION['orderSuccessID'] = $orderID;
            return true;
        }
        else {
            $conn->rollback();
            return false;
        }
        
        $conn->autocommit(TRUE);
    }
       
    public function getOrdersHistory($userID){
        $conn = $this->conn;
        
        $stmt = $conn->prepare("SELECT * FROM orders LEFT JOIN order_details on orders.ordersID = order_details.orderID 
            LEFT JOIN products on order_details.productID = products.ID WHERE userID = ?");
        
        // bind params
        $stmt->bind_param('i', $userID);
        
        // execute query
        $stmt->execute();
        
        // get results
        $result = $stmt->get_result();
        
        if (! $result) {
            echo "Error in the SQL statement";
            return NULL;
            exit();
        }
        
        if ($result->num_rows == 0) {
            return NULL;
        } else {
            $ordersHistory_array = array();
            
            while ($order = $result->fetch_assoc()) {
                array_push($ordersHistory_array, $order);
            }
            return $ordersHistory_array;
        }
    }
    
    public function getSalesReport($start, $end){
        $conn = $this->conn;
        
        $stmt = $conn->prepare("SELECT * FROM orders
            WHERE timestamp BETWEEN '$start' and '$end 23:59:59' ORDER BY `totalProducts` DESC");
        
        // execute query
        $stmt->execute();
        
        // get results
        $result = $stmt->get_result();
        
        if (! $result) {
            echo "Error in the SQL statement";
            return NULL;
            exit();
        }
        
        if ($result->num_rows == 0) {
            return NULL;
        } else {
            $ordersHistory_array = array();
            
            while ($order = $result->fetch_assoc()) {
                array_push($ordersHistory_array, $order);
            }
            return $ordersHistory_array;
        }
    }
    
    public function getSalesReportJSON($start, $end){
        $conn = $this->conn;
        
        $stmt = $conn->prepare("SELECT * FROM orders
            WHERE timestamp BETWEEN '$start' and '$end 23:59:59' ORDER BY `totalProducts` DESC");
        
        // execute query
        $stmt->execute();
        
        // get results
        $result = $stmt->get_result();
        
        if (! $result) {
            echo "Error in the SQL statement";
            return NULL;
            exit();
        }
        
        if ($result->num_rows == 0) {
            return NULL;
        } else {
            $ordersHistory_array = array();
            
            while ($order = $result->fetch_assoc()) {
                array_push($ordersHistory_array, $order);
            }
            return json_encode($ordersHistory_array, JSON_PRETTY_PRINT);
        }
    }
    
    public function getDiscount($discountCode){
        $conn = $this->conn;
        
        $discountCode = mysqli_real_escape_string($conn, $discountCode);
        
        $stmt = $conn->prepare("SELECT * FROM discount_codes WHERE discountCodes = ? LIMIT 1");
        
        // bind params
        $stmt->bind_param('s', $discountCode);
        
        // execute query
        $stmt->execute();
        
        // get results
        $result = $stmt->get_result();
        
        if (! $result) {
            echo "Error in the SQL statement for discount code";
            return NULL;
            exit();
        }
        
        if ($result->num_rows == 0) {
            return NULL;
        } else {
            $discountArray = array();
            
            while ($discount = $result->fetch_assoc()) {
                array_push($discountArray, $discount);
            }
            
            return $discountArray;
        }
    }
    
    public function removeUsedDiscount($discountCode){
        $conn = $this->conn;
        
        $stmt = $conn->prepare("DELETE FROM discount_codes WHERE discountCodes = '$discountCode'");
        
        if (! $stmt) {
            echo "Something went wrong removing the used discount code.";
            exit();
        }
        
        $stmt->execute();
        
        return true;
    }
}
