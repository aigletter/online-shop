<?php
function view(array $params): void
{
    require_once __DIR__ . '/../model/category-model.php';
    require_once __DIR__ . '/../model/products-model.php';


// Отримуємо id категорії з запиту користувача
    $categoryId = $params['id'];

// Отримуємо дані про категорію та продукти, що належать до неї
    $category = getCategoryById($categoryId);
    $products = getProductsByCategoryId($categoryId);

    include __DIR__ . '/../view/category-index.php';
}