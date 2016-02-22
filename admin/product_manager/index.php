<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/model/products_db.php');
$action = filter_input(INPUT_POST, 'action');

if($_SESSION['admin_user']){
    if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}
if ($action == 'list_products') {
    $products = get_products();
    include('product_list.php');
} else if ($action == 'delete_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    if ($product_id == NULL || $product_id == FALSE) {
        $message = "Missing or incorrect product id or category id.";
        include($_SERVER['DOCUMENT_ROOT'] . '/errors/error.php');
    } else { 
        delete_product($product_id);
        header("Location: .?action=show_add_form");
    }
} else if ($action == 'show_add_form') {
    include('product_add.php');   
    
} else if ($action == 'add_product') {
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price');
    $description = filter_input(INPUT_POST, 'description');
    $img = filter_input(INPUT_POST, 'img');
    if ($code == NULL || $name == NULL || $price == NULL || $price == FALSE) {
        $message = "Invalid product data. Check all fields and try again.";
    } else { 
        add_product($code, $name, $price, $description, $img);
        header("Location: .?show_add_form");
    }
    
} else if ($action == 'upload_image') {
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/media/products/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $message =  "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $message =  "File is not an image.";
            $uploadOk = 0;
            header("Location: .?action=show_add_form");
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $message =  "Sorry, file already exists.";
        $uploadOk = 0;
        header("Location: .?action=show_add_form");
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $message =  "Sorry, your file is too large.";
        $uploadOk = 0;
        header("Location: .?action=show_add_form");
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $message =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        header("Location: .?action=show_add_form");
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded.";
        header("Location: .?action=show_add_form");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            header("Location: .?action=show_add_form");
        } else {
            $message = "Sorry, there was an error uploading your file.";
            header("Location: .?action=show_add_form");
        }
    }
}
}else{
    header('location: /php_project/index.php');
}

?>