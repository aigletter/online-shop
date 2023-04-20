<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productTitle = $_POST['productTitle'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];
    $catId = $_POST['catId'];

    require_once __DIR__ . '/../model/add-product-model.php';
    $success = addProducts($productTitle, $productDescription, $productPrice, $catId);

    if ($success) {
        echo "successfully add new product";
    } else {
        echo "error";
    }
}