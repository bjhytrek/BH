<?php

session_start();

//  check that user is not signed in and submitted the form.
if (!$_SESSION['logged_user']){
    if ($_POST['username']){
        //  get register_user function
        require($_SERVER['DOCUMENT_ROOT'] . '/model/register_db.php');
        $message = register_user();
        include('register_view.php');

    }else {
        $message = 'Please fill out all form inputs.';
        include('register_view.php');
    }   
}else {
    header('Location: /index.php');
}


?>