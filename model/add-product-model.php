<?php

require_once __DIR__ . '/db.php';

function addProducts($productTitle, $productDescription, $productPrice, $catId)
{
    $connection = getConnection();

    $query = "INSERT INTO
    products
        (name, description, price, category_id)
    VALUES
        ('$productTitle', '$productDescription', '$productPrice', '$catId')";


    $result = mysqli_query($connection, $query);

    if ($result) {
        return true;
    }
}

function getCategories()
{
    $connection = getConnection();
    $query = "SELECT id, name, description FROM categories";

    $result = mysqli_query($connection, $query);

    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $categories;
}
