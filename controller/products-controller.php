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
