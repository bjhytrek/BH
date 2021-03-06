<!DOCTYPE html>
<html>

<?php include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/head/head.php'; ?>

    <body>
        <?php 
        include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/nav/nav.php'; 
        ?>
            <main class="container">
                <div class="row">
                    <h3>My Account</h3>
                    
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
                <a class="btn" href="/account/index.php?action=edit_account">Edit Account</a>
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