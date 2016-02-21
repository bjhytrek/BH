<?php
//  REQUIRE DB CONNECTION
    require($_SERVER['DOCUMENT_ROOT'] . '/model/dbConnector.php');
    require($_SERVER['DOCUMENT_ROOT'] . '/model/password.php');
    
function login_user(){
    $db = loadDatabase();
    
    $username = stripslashes($_POST['username']);
    $password = stripslashes($_POST['password']);
    
    $stmt = $db->prepare('SELECT * FROM user WHERE username = :username');
    $stmt->bindValue(':username', $username);     
    $stmt->execute();
    $user = $stmt->fetch();
    
   
    
//  Check if user is in database
    if ($user['username'] and password_verify($password, $user['password'])){
//         echo $user['username'], $user['password'];
        //  User is in DB, log them in.
        $_SESSION['logged_user'] = $user['username'];
         $message = $user['username'] .  ' You are now logged in!';
        
//  Check admin status and set session to reflect.
        if($user['admin'] == true){
            $_SESSION['admin_user'] = true;
        }

    }else {
        $message = "The Username or Password entered was not found in our database.";
    }
    return $message;
}

?>