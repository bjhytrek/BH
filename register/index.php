<?php

session_start();

//  check that user is not signed in and submitted the form.
if (!$_SESSION['logged_user']){
    if ($_POST['username'] and $_POST['password'] == $_POST['password2']){
        //  get register_user function
        require($_SERVER['DOCUMENT_ROOT'] . '/model/register_db.php');
        $message = register_user();
        include('register_view.php');

    }else {
        echo $_SESSION['logged_user'];
        echo 'This is the posted username =====' . $_POST['username'];
        if ($_POST['password'] == $_POST['password2']){
            echo '<br> passwords match';
            echo $_POST['password'];
            echo '<br>' . $_POST['password2'];
        }
        $message = 'Passwords must match, and all forms must be filled.';
        include('register_view.php');
    }   
}else {
    header('Location: /index.php');
}


?>