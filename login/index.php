<?php
session_start();
//  See if user is logged in
if (!$_SESSION['logged_user']) {
    if ($_POST['username'] and $_POST['password']){
        require($_SERVER['DOCUMENT_ROOT'] . '/model/login_db.php');
        $message = login_user();
        include('login_view.php');
    }else {
        $message = 'Please fill out all form inputs.';
        include('login_view.php');
    }
}else{
    include('login_view.php');
}
?>