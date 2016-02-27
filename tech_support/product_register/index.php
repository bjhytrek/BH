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
var_dump($action);

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
    print_r($_SESSION['customerId']);
    $customerID = $_SESSION['customerId'];
    $submitted_product = filter_input(INPUT_POST, 'product');
    if(!$submitted_product == null){
        $inserted = add_registration($customerID, $submitted_product);
        if($inserted){
            $message = 'Product (' . $submitted_product .') was registered succesfully.';
            include 'product_register.php';
        }else {
            $message = 'Product (' . $submitted_product . ') could not be registered.';
            include 'product_register.php';
        }   
    }
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