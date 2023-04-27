<?php
require_once __DIR__ . '/db.php';
// Функція для отримання категорії за її id
function getCategoryById($categoryId)
{
    $connection = getConnection();

    $query = "SELECT * FROM categories WHERE id=$categoryId";
    $result = mysqli_query($connection, $query);
    return mysqli_fetch_array($result, MYSQLI_ASSOC);
}