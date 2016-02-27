<?php include '../view/header.php'; ?>
    <main>

        <h2>Register Product</h2>
        <?php if (isset($message)) : ?>
            <p>
                <?php echo $message; ?>
            </p>
            <?php else: 
        // Build the product registration form
        echo '<p>Customer: ' . $customer['firstName'] . ' ' . $customer['lastName'] . '</p>' ;
        echo $_SESSION['customer_id'];
        ?>
                <form action="index.php" method="POST">
                    <input type="hidden" name="action" value="register_product" />
                    <label for="product">Product:   </label>
                    <select name="product">
                        <?php foreach ($products as $product) : ?>
                            <option value="<?php echo $product['productCode']; ?>">
                                <?php echo $product['name'];  ?>
                            </option>
                            <?php endforeach; ?>
                    </select>
                    <br>
                    <br>
                    <button type="submit">Register Product</button>
                </form>
                <?php endif; ?>

    </main>
    <?php include '../view/footer.php'; ?>