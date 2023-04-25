<?php

function index()
{
    require_once __DIR__ . '/../model/products-model.php';

    $products = getProducts();

    include __DIR__ . '/../view/products-index.php';
}


function add()
{
    require_once __DIR__ . '/../model/categories-model.php';

    $categories = getCategories();

    include __DIR__ . '/../view/add-index.php';
}


function clearData($val = ""): string
{
    $val = trim($val);
    $val = strip_tags($val);
    $val = stripslashes($val);
    return htmlspecialchars($val);
}


function save()
{
    $uploadDir = __DIR__ . '/../images/';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $productTitle = clearData($_POST['productTitle']);
        $productDescription = clearData($_POST['productDescription']);
        $productPrice = clearData($_POST['productPrice']);
        $catId = clearData($_POST['catId']);
        $productImage = $_FILES['image'];
        $imagePaths = '';

        $tmp_name = $_FILES['image']['tmp_name'];

        if (is_uploaded_file($productImage['tmp_name'])) {
            if ($productImage['size'] > 1000000) {
            } else {
                $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
                if (!in_array($productImage['type'], $allowedTypes)) {
                    echo "File type not allowed.";
                } else {
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir);
                    }
                    $filepath = uniqid() . '-' . basename($productImage['name']);
                    $destination = $uploadDir . $filepath;
                    $fileName = $productImage['tmp_name'];
                    move_uploaded_file($fileName, $destination);
                    $imagePaths = '/images/' . $filepath;
                }
            }
        }

        require_once __DIR__ . '/../model/add-product-model.php';
        $success = addProduct($productTitle, $productDescription, $productPrice, $catId, $imagePaths);

        if ($success) {
            header('Location:/products');
            exit();
        } else {
            echo "error";
        }

    } else {
        include __DIR__ . '/../view/add-index.php';
    }
}
