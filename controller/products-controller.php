<?php

function index()
{
    require_once __DIR__ . '/../model/products-model.php';

    $products = getProducts();

    include __DIR__ . '/../view/products-index.php';
}


function details($parameters)
{
    require_once __DIR__ . '/../model/products-model.php';

    $product = getProduct($parameters['id']);

    include __DIR__ . '/../view/product-details.php';
}

function view()
{
    require_once __DIR__ . '/../model/products-model.php';
    require_once __DIR__ . '/../model/categories-model.php';

    $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $segments = explode('/', $path);
    $id = end($segments);

    $product = getProduct($id)[0];
    $category = getCategory($id)[0];

    include __DIR__ . '/../view/products-view.php';
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
            header("Location: http://online-shop/products/view/id/$id");
            exit();
        }

    } else {
        require_once __DIR__ . '/../model/products-model.php';
        require_once __DIR__ . '/../model/categories-model.php';

        $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $segments = explode('/', $path);
        $id = end($segments);

        $product = getProduct($id)[0];
        $categories = getCategories();

        include __DIR__ . '/../view/products-edit.php';
    }
}