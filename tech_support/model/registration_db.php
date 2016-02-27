<?php
// Register the product and associate it with the customer
// Check the registrations table to see what data is expected
function add_registration($customer_id, $product_code) {
    global $db;
    date_default_timezone_set("America/Denver");
    $current_date = date("Y/m/d");
    
    $query = "INSERT INTO registrations (customerID, productCode, registrationDate)
    VALUES (:customer_id, :product_code, :current_date);";
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':product_code', $product_code);
    $statement->bindValue(':current_date', $current_date);
    if ($statement->execute()){
        
        return true;
    }else {
        return false;
    }  
}
function is_registered($product_code) {
    global $db;
    
// Check if a product is already registered to this user.
    $query = "SELECT customerID FROM registrations WHERE productCode = :product_code;";
    $statement = $db->prepare($query);
    $statement->bindValue(':product_code', $product_code);
    $statement->execute();
    if($statement->rowCount() > 0){
           return true;
    }else {
        return false;
    }
}
?>