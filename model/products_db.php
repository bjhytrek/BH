<?php
//  REQUIRE DB CONNECTION
    require($_SERVER['DOCUMENT_ROOT'] . '/model/dbConnector.php');

function get_products() {
      $db = loadDatabase();
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
function get_product($product_id) {
    $db = loadDatabase();
    $query = 'SELECT * FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function delete_product($product_id) {
    $db = loadDatabase();
    $query = 'DELETE FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($category_id, $code, $name, $price, $description, $img) {
    $db = loadDatabase();
    $query = 'INSERT INTO products
                 (categoryID, productCode, productName, listPrice, description, img)
              VALUES
                 (:category_id, :code, :name, :price, :description, :img)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':img', $img);
    $statement->execute();
    $statement->closeCursor();
}

?>