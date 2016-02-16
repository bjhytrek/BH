<?php
//  get register_user function
require('php_functions/register_user.php');

    if ($_POST['username']){
        
        $message = register_user();
    }else {
        echo '<div class="row">
            <h3>Register</h3>
            <form class="col s12 l6" name="register" method="POST">
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