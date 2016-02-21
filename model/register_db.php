<?php

function register_user(){
//  get passwordHash library for backwards compatability.
    require('password.php');
//  get database connection object
    require('dbConnector.php');
    $db = loadDatabase();

//  Get check_user function
    require('check_user_db.php');
//  get user submitted form
        $username = stripslashes($_POST['username']);
        $password = stripslashes($_POST['password']);
        

//  Check if username exists using check_user()
    if(check_user($db, $username)){
        $message = "Username '$username' already exists.";
    }else {
//  hash and salt password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
// Prepared statement to insert a user
        $stmt = $db->prepare("INSERT INTO user (username, password)
    VALUES (:username, :passwordHash);");
        $stmt->bindValue(':username', $username); 
        $stmt->bindValue(':passwordHash', $passwordHash); 
        $stmt->execute();
        $_SESSION['logged_user'] = $username;
        $message = "$username, you are now registered.";
    }


    return $message;
}

?>