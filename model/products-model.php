<?php

require_once __DIR__ . '/db.php';

function getProducts()
{
    $connection = getConnection();
    $result = mysqli_query($connection, "
        SELECT products.*, images.uri as image FROM products
        LEFT JOIN images
        ON images.product_id = products.id
        AND images.is_main = 1
    ");

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getSingleProduct($id)
{
    $connection = getConnection();
    $result = mysqli_query($connection, "
        SELECT products.*, images.uri as image, categories.name as category_name FROM products 
        LEFT JOIN images
        ON images.product_id = products.id
        AND images.is_main = 1
        LEFT JOIN categories
        ON categories.id = products.category_id
        WHERE products.id = $id
    ");

    return mysqli_fetch_array($result, MYSQLI_ASSOC);
}