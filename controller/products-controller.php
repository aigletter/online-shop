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

const UPLOAD_DIR = '../images/';

function saveProduct()
{
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
                if (!file_exists(UPLOAD_DIR)) {
                    mkdir(UPLOAD_DIR);
                }
                $filepath = uniqid() . '-' . basename($productImage['name']);
                $destination = UPLOAD_DIR . $filepath;
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
    } else {
        echo "error";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    saveProduct();
}


function details($parameters)
{
    require_once __DIR__ . '/../model/products-model.php';

    $product = getSingleProduct($parameters['id']);

    include __DIR__ . '/../view/product-details.php';
}