<?php include '../view/header.php'; ?>
<main>

    <h2>Customer Login</h2>
    <p>You must login before you can register a product.</p>
    <!-- Build a login form similar to the one shown in the exam directions -->
    <form action="index.php" method="POST">
       <input type="hidden" name="action" value="login" />
        <label for="email">Email:</label>
        <input type="text" name="email">
        <button type="submit">Login</button>
    </form>
<?php echo $message; ?>
</main>
<?php include '../view/footer.php'; ?>