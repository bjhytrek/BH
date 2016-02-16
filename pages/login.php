<?php

require('php_functions/login_user.php');

//  CHECK IF USER IS CURRENTLY LOGGED IN
$user = $_SESSION['logged_user'];
if (isset($user)) {
    $message = "Hello, $user. You are already logged in.";
}else {
    echo ' 
    <div class="row">
        <h3>Login</h3>
        <form class="col s12 l6" name="login" method="POST">
          <div class="row">
              <input class="validate"type="text" placeholder="Username" name="username" class="validate"></input><br>
              <input type="text" placeholder="password" name="password" class="validate"></input>
          </div>
          <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
        <i class="material-icons right">send</i>
      </button>
      </form>
  </div>';
    echo '
    <div class="row">
    <h3>Register</h3>
    <form class="col s12 l6" action="/index.php?page=register" name="register" method="POST">
      <div class="row">
          <input type="text" placeholder="Username" name="username" class="validate"></input><br>
          <input type="text" placeholder="password" name="password" class="validate"></input>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
    <i class="material-icons right">send</i>
  </button>
  </form>
  </div>';
}
echo "<h4>$message</h4>";
?>