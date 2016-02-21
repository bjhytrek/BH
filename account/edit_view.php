<!DOCTYPE html>
<html>

<?php include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/head/head.php'; ?>

    <body>
        <?php 
        include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/nav/nav.php'; 
        ?>
            <main class="container">
                <div class="row">
                    <h3>Edit My Account</h3>
                    
                    <h4>Current Account Information:</h4>
                    <table class="striped">
                        <tbody>
                            <tr>
                                <td>Username:</td>
                                <td><?php echo $user['username']; ?></td>
                            </tr>
                            <tr>
                              <td>Account Type:</td>  
                              <td><?php if($user['admin'] == true){echo 'Admin';}else {echo 'standard'; }?></td>  
                            </tr>
                             <tr>
                              <td>Email:</td>  
                              <td><?php echo $user['email'];?></td>  
                            </tr>
                        </tbody>
                    </table>
                    <?php echo $message ?>
                </div>
                <form action="/account/index.php" method="post">
                    <input type="text" name="username" placeholder="username">
                    <input type="text" name="email" placeholder="email">
                    <button class="btn" type="submit" name="submit">Submit</a>
                </form>
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