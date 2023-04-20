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

    $product = getSingleProduct($parameters['id']);

    include __DIR__ . '/../view/product-details.php';
}