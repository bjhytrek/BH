<?php
session_start();
//  See if user is logged in
if($_SESSION['logged_user']) {
    
//  GET USER INFORMATION
    require($_SERVER['DOCUMENT_ROOT'] . '/model/user_db.php');
    $message = get_user($_SESSION['logged_user']);
    include('account_view.php');
}else{
    header('Location: /login/index.php');
}

?>