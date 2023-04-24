<?php

require_once __DIR__ . '/db.php';

function addProduct($productTitle, $productDescription, $productPrice, $catId, $imagePaths)
{
    $connection = getConnection();

    mysqli_begin_transaction($connection);

    $query = "INSERT INTO
    products
        (name, description, price, category_id)
    VALUES
        ('$productTitle', '$productDescription', '$productPrice', '$catId')";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        mysqli_rollback($connection);
        mysqli_close($connection);
        return false;
    }

    $productId = mysqli_insert_id($connection);

    $is_main = 0;
    if ($imagePaths) {
        $is_main = 1;
    }
    $sql = "INSERT INTO images (product_id, uri, is_main) VALUES ('$productId', '$imagePaths', '$is_main')";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        mysqli_rollback($connection);
        mysqli_close($connection);
        return false;
    }

    mysqli_commit($connection);
    mysqli_close($connection);
    return $productId;
}
