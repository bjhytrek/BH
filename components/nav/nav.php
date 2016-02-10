<nav class="nav" id="site-nav">
    <ul class="list">
        <?php
        foreach($pages as $link){
           echo  "<li class=\"nav__links\"><a href=\"/index.php?page=$link\">$link</a></li>";
        }
        ?>

    </ul>
    
</nav>