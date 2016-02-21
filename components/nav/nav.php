<nav class="nav" id="site-nav">
    <div class="nav-wrapper container">
       <a id="logo-container" href="/index.php" class="brand-logo">BH</a>
        <ul class="right hide-on-med-and-down">
            <?php
        $nav_links = array ('cit336', 'cs313', 'amazon', 'account', 'php_project');
        foreach($nav_links as $link){
           $navLinks .=  "<li class=\"nav__links\"><a href=\"/$link/index.php\">$link</a></li>";
            
        }
           echo $navLinks;
        ?>


                <li>
                    <?php
                    $logged_user = $_SESSION['logged_user'];
                    if(isset($logged_user)){
                       $login_btn .= '<a class="waves-effect waves-light btn" href="/logout/index.php">Logout</a>';
                        $display_name = "<li><a href=\"/account/index.php\"><i class=\"material-icons left\">perm_identity</i>$logged_user</a></li>" ;
                    }else {

                        $login_btn .= '<a class="waves-effect waves-light btn" href="/login/index.php">Login</a><a class="waves-effect waves-light btn" href="/register/index.php">Register</a>';

                    }
                    echo $login_btn;
                    echo $display_name;
             ?>
                </li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <?php
        
            echo $navLinks;
            echo "<li>$login_btn</li>";
            echo $display_name;
        ?>
        </ul>
        
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

    </div>
</nav>