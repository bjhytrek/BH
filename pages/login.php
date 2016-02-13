<?php

//  CHECK IF USER IS CURRENTLY LOGGED IN
$user = $_SESSION['login_user'];
if (isset($user)) {
    echo "Hello, $user. You are already logged in.";
}else {
    echo ' 
    <div class="row">
    <h3>Login</h3>
    <form class="col s12 l6" name="login">
      <div class="row">
      <input type="text" placeholder="Username" name="username"></input><br><input type="text" placeholder="password" name="password"></input></div></form></div>';
    echo '
    <div class="row">
    <h3>Register</h3>
    <form class="col s12 l6" name="register">
      <div class="row">
      <input type="text" placeholder="Username" name="username"></input><br><input type="text" placeholder="password" name="password"></input></div></form></div>';
}

?>