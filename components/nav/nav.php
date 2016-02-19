<nav class="nav" id="site-nav">
    <div class="nav-wrapper container">
       <a id="logo-container" href="/index.php" class="brand-logo">BH</a>
        <ul class="right hide-on-med-and-down">
            <?php
        $nav_links = array ('cit336', 'cs313', 'amazon', 'account', 'php project');
        foreach($nav_links as $link){
           $navLinks .=  "<li class=\"nav__links\"><a href=\"/$link/index.php\">$link</a></li>";
            
        }
           echo $navLinks;
        ?>


                <li>
                    <?php
                    if(isset($_SESSION['logged_user'])){
                       $login_btn .= '<a class="waves-effect waves-light btn" href="/logout/index.php">Logout</a>';
                    }else {

                        $login_btn .= '<a class="waves-effect waves-light btn" href="/login/index.php">Login</a><a class="waves-effect waves-light btn" href="/register/index.php">Register</a>';

                    }
                    echo $login_btn;
             ?>
                </li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <?php
        
            echo $navLinks;
            echo "<li>$login_btn</li>"
        ?>
        </ul>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

    </div>
</nav>