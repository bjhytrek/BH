<?php
//  REQUIRE DB CONNECTION
    require($_SERVER['DOCUMENT_ROOT'] . '/model/dbConnector.php');
    
function login_user(){
    $db = loadDatabase();
    
    $username = stripslashes($_POST['username']);
    $password = stripslashes($_POST['password']);
    
    $stmt = $db->prepare('SELECT username, password FROM user WHERE username = :username');
    $stmt->bindValue(':username', $username);     
    $stmt->execute();
    $user = $stmt->fetch();
    
//    echo $user['username'], $user['password'];
    
//  Check if user is in database
    if ($user['username'] and password_verify($password, $user['password'])){
        
//  Check admin status and set session to reflect.
        if($user['admin'] == 1){
            $_SESSION['user_admin'] = true;
        }
//  User is in DB, log them in.
        $_SESSION['logged_user'] = $user['username'];
         $message = $user['username'] .  ' You are now logged in!';
    }else {
        $message = "The Username or Password entered was not found in our database.";
    }
    return $message;
}

?>