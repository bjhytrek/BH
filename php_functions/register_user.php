<?php

function register_user(){
    //  get database connection object
    require('php_functions/dbConnector.php');
    $db = loadDatabase();

    //  Get check_user function
    require('php_functions/check_user.php');
    //  get user submitted form
        $username = stripslashes($_POST['username']);
        $password = stripslashes($_POST['password']);
        var_dump($username, $password);

    //  Check if username exists using check_user()
    if(check_user($db, $username, $password)){
        $message = "Username '$username' already exists.";
    }else {
        // Prepared statement to insert a user
        $stmt = $db->prepare("INSERT INTO user (username, password)
    VALUES ('$username', '$password');");
        $stmt->execute();
        $_SESSION['logged_user'] = $username;
        $message = "$username, you are now registered.";
    }


    return $message;
}

?>