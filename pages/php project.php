<!DOCTYPE html>
<html>

<?php include 'components/head/head.php'; ?>

    <body>
        <?php 
        include 'components/nav/nav.php'; 
        ?>
            <main class="container">
                <div class="row">
                    <h2>PHP Project</h2>
                    <div class="row">
                        
                    </div>
                </div>

            </main>




            <?php 
    if($site_id === "cit336"){
        include 'components/cit336/footer/footer.php';
    }else {
            include 'components/footer/footer.php';
    } 
    ?>
                <!--Import jQuery before materialize.js-->
                <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
                <script type="text/javascript" src="/js/bin/materialize.min.js"></script>
                <script type="text/javascript" src="/index.js"></script>
    </body>

</html>