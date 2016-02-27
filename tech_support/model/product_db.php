<?php

// Get all the products for the registration dropdown list
function get_products() {
     global $db;
    $query = 'SELECT * FROM products';
    $statement = $db->prepare($query);
    $statement->execute();
    if ($statement->execute()) {
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $products[] = $row;
        };
    }
    $statement->closeCursor();
    return $products;
}
