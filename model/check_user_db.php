<?php

function check_user($db,$username){
    
  //  Verify that user is in Db and login.
    $stmt = $db->prepare("SELECT username FROM user WHERE username = '$username'");
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
//        echo '<br>This is the fetched username:::::::';
//        echo $user['username'];
    
//  Check if user is in database
    if ($user['username']){
        return true;
    }else {
        return false;
    }  
}



?>