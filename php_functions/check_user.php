<?php

function check_user($db,$username, $password){
  //  Verify that user is in Db and login.
    $stmt = $db->prepare("SELECT username, password FROM user WHERE username = '".$username."' AND  password = '".$password."'");
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        echo '<br>This is the fetched username:::::::';
        echo $user['username'];
    
//  Check if user is in database
    if ($user['username'] and $user['password']){
        return true;
    }else {
        return false;
    }  
}



?>