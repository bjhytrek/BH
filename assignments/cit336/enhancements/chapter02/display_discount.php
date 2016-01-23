<?php
	$product_description = filter_input(INPUT_POST, 'product_description');
	$list_price = filter_input(INPUT_POST, 'list_price');
	$discount_percent = filter_input(INPUT_POST, 'discount_percent');
	$sales_tax_rate = "8%";
	$process_numbers = true;

    if(empty($product_description)){
        echo '<p style="color:red">Please fill out the product description.</p>';
    }
    if(empty($list_price)){
        echo '<p style="color:red">Please fill out the List Price.</p>';
        $process_numbers = false;
    }
    if(is_numeric($list_price) == false){
        echo '<p style="color:red">You must enter a number as the List Price';
        $process_numbers = false;
    }
    if(empty($discount_percent)){
        echo '<p style="color:red">Please fill out the Discount %.</p>';
        $process_numbers = false;
    }
    if(is_numeric($discount_percent) == false){
        echo '<p style="color:red">You must enter a number as the Discount %';
        $process_numbers = false;
    }


    if($process_numbers === true){
        $discount = $list_price * $discount_percent * .01;
        $discount_price = $list_price - $discount;
        
        $list_price_f = "$".number_format($list_price, 2);
        $discount_percent_f = $discount_percent."%";
        $discount_f = "$".number_format($discount, 2);
        $discount_price_f = "$".number_format($discount_price, 2);
        
        $tax = $discount_price * .08;
        $sales_tax_amount = "$".number_format($tax,2);
    }
        
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($product_description); ?></span><br>

        <label>List Price:</label>
        <span><?php echo htmlspecialchars($list_price_f); ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo htmlspecialchars($discount_percent_f); ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo $discount_f; ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo $discount_price_f; ?></span><br>
        
        <br><label>Sales Tax Rate:</label>
        <span><?php echo "$sales_tax_rate"; ?></span><br>
        
        <label>Sales Tax Amount:</label>
        <span><?php echo "$sales_tax_amount"; ?></span><br>
        
        <br><a href="index.html">Return to Form</a>
    </main>
</body>
</html>