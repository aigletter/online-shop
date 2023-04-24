<?php

require_once __DIR__ . '/db.php';
function getCategories()
{
    $connection = getConnection();
    $query = "SELECT id, name, description FROM categories";

    $result = mysqli_query($connection, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);

}
