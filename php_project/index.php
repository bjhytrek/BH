<?php

//  REQUIRE DB FUNCTION TO GET PRODUCTS FROM DATABASE.
require ($_SERVER['DOCUMENT_ROOT'] . '/model/products_db.php');

$products = get_products();
include $_SERVER['DOCUMENT_ROOT'] . '/php_project/php_project_view.php';

?>