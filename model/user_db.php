<?php
//  REQUIRE DB CONNECTION
    require($_SERVER['DOCUMENT_ROOT'] . '/model/dbConnector.php');
    
// Get user information
function get_user($username){
    $db = loadDatabase();
    $query = 'SELECT * FROM user
              WHERE username = :username';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();    
    $user = $statement->fetch();
    $statement->closeCursor();    
    return $user;
}
function edit_user($current_username, $new_username, $new_email){
    $db = loadDatabase();
    $query = 'UPDATE user SET username = :new_username, email = :new_email
              WHERE username = :username';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $current_username);
    $statement->bindValue(':new_username', $new_username);
    $statement->bindValue(':new_email', $new_email);
    $statement->execute();
    if($statement->rowCount() > 0){
        $_SESSION['logged_user'] = $new_username;
        $message = 'User was succesfully updated.';
    }else {
        $message = 'User could not be updated.';
    }
    
    return $message;
       
}

?>