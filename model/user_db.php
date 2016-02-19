<?php
//  REQUIRE DB CONNECTION
    require($_SERVER['DOCUMENT_ROOT'] . '/model/dbConnector.php');
    
// Get user information
function get_user($username){
    $db = loadDatabase();
    $query = 'SELECT username FROM user
              WHERE username = :username';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();    
    $user = $statement->fetch();
    $statement->closeCursor();    
    $username = $user['username'];
    return $username;
}

?>