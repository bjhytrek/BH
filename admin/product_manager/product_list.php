<!DOCTYPE html>
<html>

<?php include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/head/head.php'; ?>

    <body>
        <?php 
        include '' . $_SERVER['DOCUMENT_ROOT'] . '/components/nav/nav.php'; 
        ?>
            <main class="container">
                <h1>Product List</h1>
                <section>
                    <!-- display a table of products -->
                    <table class="striped">
                       <thead>
                        <tr>
                            <th data-field="code">Code</th>
                            <th data-field="name">Name</th>
                            <th class="right" data-field="price">Price</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td>
                                    <?php echo $product['productCode']; ?>
                                </td>
                                <td>
                                    <?php echo $product['productName']; ?>
                                </td>
                                   <td>
                                    <?php echo $product['description']; ?>
                                </td>
                                <td class="right">
                                    <?php echo $product['listPrice']; ?>
                                </td>
                                <td>
                                    <form action="." method="post">
                                        <input type="hidden" name="action" value="delete_product">
                                        <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                                        <input type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </table>
                    <p><a href="?action=show_add_form">Add Product</a></p>
                </section>
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