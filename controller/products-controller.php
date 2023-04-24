<?php

function index()
{
    require_once __DIR__ . '/../model/products-model.php';

    $products = getProducts();

    include __DIR__ . '/../view/products-index.php';
}

function view()
{
    require_once __DIR__ . '/../model/products-model.php';

    $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $segments = explode('/', $path);
    $id = end($segments);

    $product = getProduct($id)[0];
    $category = getCategory($id)[0];

    include __DIR__ . '/../view/products-view.php';
}

function edit()
{
    require_once __DIR__ . '/../model/products-model.php';

    $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $segments = explode('/', $path);
    $id = end($segments);

    $product = getProduct($id)[0];
    $categories = getCategories();

    include __DIR__ . '/../view/products-edit.php';
}