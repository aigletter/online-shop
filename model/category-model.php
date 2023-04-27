<?php
require_once __DIR__ . '/db.php';
// Функція для отримання категорії за її id
function getCategoryById($category_id)
{
    $connection = getConnection();

    $query = "SELECT * FROM categories WHERE id=$category_id";
    $result = mysqli_query($connection, $query);
    return mysqli_fetch_array($result, MYSQLI_ASSOC);
}


// Функція для отримання продуктів за id категорії
function getProductsByCategoryId($category_id)
{
    $connection = getConnection();

    $query = "SELECT * FROM products WHERE category_id=$category_id";
    $result = mysqli_query($connection, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}