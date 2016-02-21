
    <!DOCTYPE html>
    <html>

    <?php include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/head/head.php'; ?>

        <body>
            <?php 
        include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/nav/nav.php'; 
        ?>
                <main class="container">
                    <div class="row">
                        <h2>Products</h2>
                        <?php 
                        if($_SESSION['admin_user']){
                        echo '<a href="/admin/products/index.php"><h4>Admin Edit</h4></a>';
                        }?>
                            <?php foreach ($products as $product) : ?>
                                <div class="col s12 m6 l4">
                                    <div class="card large">
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="activator" src="<?php echo $product['img']; ?>">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title activator grey-text text-darken-4"><?php echo $product['productName']; ?><i class="material-icons right">more_vert</i></span>
                                            <br><span class="card-title activator grey-text text-darken-4"><?php echo '$' . $product['listPrice']; ?></span><a class="btn" href="#">Add to Cart</a>
                                        </div>
                                        <div class="card-reveal">
                                            <span class="card-title grey-text text-darken-4"><?php echo $product['productName']; ?><i class="material-icons right">close</i></span>
                                            <p>
                                                <?php echo $product['description']; ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <?php endforeach; ?>
                    </div>

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