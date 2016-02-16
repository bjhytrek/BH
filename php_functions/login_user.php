<?php
//  REQUIRE DB CONNECTION
require('php_functions/dbConnector.php');
$db = loadDatabase();
function login_user($db){
    $username = stripslashes($_POST['username']);
    $password = stripslashes($_POST['password']);
    var_dump($username, $password);
    
    $stmt = $db->prepare("SELECT username, password FROM user WHERE username = '".$username."' AND  password = '".$password."'");
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    echo '<br>This is the fetched username:::::::';
    echo $user['username'];
    
//  Check if user is in database
    if ($user['username'] and $user['password']){
//  User is DB, log them in.
        $_SESSION['logged_user'] = $user['username'];
         $message = $user['username'] . "You are now logged in!";
    }else {
        $message = "The Username or Password entered was not found in our database.";
    }
    return $message;
}



if (isset($_POST['submit'])) {
    if (empty($_POST['username']) or empty($_POST['password'])) {
        $message = "Username or Password is invalid";
    
    
    }else {
        
        $message = login_user($db);
    }
}


?>