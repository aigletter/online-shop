<?php
function clearData($val = ""): string
{
    $val = trim($val);
    $val = strip_tags($val);
    $val = stripslashes($val);
    return htmlspecialchars($val);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $productTitle = clearData($_POST['productTitle']);
    $productDescription = clearData($_POST['productDescription']);
    $productPrice = clearData($_POST['productPrice']);
    $catId = clearData($_POST['catId']);

    require_once __DIR__ . '/../model/add-product-model.php';
    $success = addProducts($productTitle, $productDescription, $productPrice, $catId);

    if ($success) {
        echo "successfully add new product";
    } else {
        echo "error";
    }
}