<?php
session_start();
//  See if user is logged in
if($_SESSION['logged_user']) {
    //  GET USER INFORMATION
    require($_SERVER['DOCUMENT_ROOT'] . '/model/user_db.php');
    
    //  GET ACTION FOR EDIT ACCOUNT FUNCTIONALITY
    if($_GET['action'] == 'edit_account'){
        $user = get_user($_SESSION['logged_user']);
        include($_SERVER['DOCUMENT_ROOT'] . '/account/edit_view.php');
    }elseif(!$_POST['username'] or !$_POST['email']) {
        $user = get_user($_SESSION['logged_user']);
        include('account_view.php');
    }else{
        //  GET SUBMITTED USER INPUT AND SANITIZE
        $new_username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $new_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = edit_user($_SESSION['logged_user'], $new_username, $new_email);
        $user = get_user($_SESSION['logged_user']);
        include('account_view.php');
    }   
 
}else{
    header('Location: /login/index.php');
}

?>