<!DOCTYPE html>
<html>

<?php include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/head/head.php'; ?>

    <body>
        <?php 
        include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/nav/nav.php'; 
        ?>
            <main class="container">
                <h1>Add Product</h1>
                <form action="index.php" method="post" id="add_product_form">
                    <input type="hidden" name="action" value="add_product">


                    <label>Code:</label>
                    <input type="text" name="code" />
                    <br>

                    <label>Name:</label>
                    <input type="text" name="name" />
                    <br>

                    <label>List Price:</label>
                    <input type="text" name="price" />
                    <br>

                    <label>Description:</label>
                    <input type="text" name="description" />
                    <br>

                    <label>img name (please use .jpg format) Example:"iphon6.jpg" :</label>
                    <input type="text" name="img" />
                    <br>

                    <label>&nbsp;</label>
                    <input type="submit" value="Add Product" />
                    <br>
                </form>
                <form action=".?action=upload_image" method="post" enctype="multipart/form-data">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <input type="submit" value="upload_image" name="submit">
                </form>
                <p class="last_paragraph">
                    <a href="index.php?action=list_products">View Product List</a>
                </p>
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