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

function details($parameters)
{
    require_once __DIR__ . '/../model/products-model.php';

    $product = getProduct($parameters['id']);

    include __DIR__ . '/../view/product-details.php';
}

function edit()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){

        require_once __DIR__ . '/../model/products-model.php';
        require_once __DIR__ . '/../model/categories-model.php';

        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $price = $_POST['price'] ?? '';
        $category = $_POST['category'] ?? '';

        $res = updateProduct($id, $name, $description, $price, $category);

        if ($res){
            header("Location: /products/details/id/$id");
            exit();
        }

    } else {
        require_once __DIR__ . '/../model/products-model.php';
        require_once __DIR__ . '/../model/categories-model.php';

        $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $segments = explode('/', $path);
        $id = end($segments);

        $product = getProduct($id);
        $categories = getCategories();

        include __DIR__ . '/../view/products-edit.php';
    }
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
