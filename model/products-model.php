<?php

require_once __DIR__ . '/db.php';

function getProducts(): array
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

// Функція для отримання продуктів за id категорії
function getProductsByCategoryId($categoryId)
{
    $connection = getConnection();

    $query = "SELECT name FROM products WHERE category_id=$categoryId";
    $result = mysqli_query($connection, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}