<?php

require_once __DIR__ . '/db.php';
function getCategories()
{
    $connection = getConnection();
    $query = "SELECT * FROM categories";
    $result = mysqli_query($connection, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);

}

function getCategory($id)
{
    $connection = getConnection();
    $result = mysqli_query($connection, "
        SELECT c.name, c.description FROM categories c
        LEFT JOIN products p on c.id = p.category_id
        WHERE p.id=$id
    ");

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}