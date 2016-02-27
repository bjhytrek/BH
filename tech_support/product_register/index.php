<?php
session_start();
// Get your db connection file, be sure it has a new connection to the
// tech support database
require('../model/dbConnector.php');


// Get the models needed - work will need to be done in both
require('../model/customer_db.php');
require('../model/registration_db.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');

if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
    if ($action == null){
        $action = 'customer_login';
    }
}

if ($action == 'customer_login'){
    include 'customer_login.php';
}
if($action == 'login'){
    $email = filter_input(INPUT_POST, 'email');
    if ($email == null){
        $message = 'Please provide a valid Email address.';
        include 'customer_login.php';
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $message = 'You have entered an invalid email addres.';
        include 'customer_login.php';
    }else {
        $customer = get_customer_by_email($email);
        if ($customer == null){
            $message = 'Your email does not match our database.';
            include 'customer_login.php';
        }else {
            $_SESSION['customerId'] = $customer['customerID'];
            $products = get_products();
            include 'product_register.php';
        }
        
    }
    
}else if($action == 'register_product'){
    $customerID = $_SESSION['customerId'];
    $submitted_product = filter_input(INPUT_POST, 'product');
    if(!$submitted_product == null){
        if(!is_registered($submitted_product)){
                $inserted = add_registration($customerID, $submitted_product);
            if($inserted){
                $message = 'Product (' . $submitted_product .') was registered succesfully.';
                
            }else {
                $message = 'Product (' . $submitted_product . ') could not be registered.';
               
            }
        }else {
            $message = 'Product (' . $submitted_product . ') has already been registered.';
        }
          include 'product_register.php'; 
    }
}else if($action == 'logout'){
    // Unset all of the session variables.
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finally, destroy the session.
    session_destroy();
    include 'customer_login';
}
/* 
 * What you will need
 *   1. The product_register application should default to the customer_login view
 *   2. If the email address is not provided, make them enter one
 *   3. Check if the email entered is valid, if so get the user information from 
 *       the database
 *   4. Send the logged-in user to the product registration page
 *   5. Automatically enter the user's name in the product registration form
 *   6. When the page loads the product list should be a drop down menu of 
 *       products built from a resultset queried out of the database
 *   7. If the product registration data is submitted, register the product
 *   8. If the product is registered successfully, confirm it to the user.
 */

?>