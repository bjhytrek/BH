<!DOCTYPE html>
<html>

<?php include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/head/head.php'; ?>

    <body>
        <?php 
        include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/nav/nav.php'; 
        ?>
            <main class="container">
                <div class="row">
                    <h3>Register</h3>
                    <form class="col s12 l6" action="/register/index.php" name="register" method="POST">
                        <div class="row">
                            <input type="text" placeholder="Username" name="username" class="validate"></input>
                            <br>
                            <input type="password" placeholder="password" name="password" class="validate"></input>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
                    
                </div>
            <h4><?php echo $message; ?></h4>
            </main>
            <?php 
    if($site_id === "cit336"){
        include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/cit336/cit336.php';
    }else {
            include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/footer/footer.php';
    } 
    ?>
                <!--Import jQuery before materialize.js-->
                <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
                <script type="text/javascript" src="/js/bin/materialize.min.js"></script>
                <script type="text/javascript" src="/index.js"></script>
    </body>

</html>