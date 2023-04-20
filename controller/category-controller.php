<?php
function view(array $params): void
{
    require_once __DIR__ . '/../model/category-model.php';

// Отримуємо id категорії з запиту користувача
    $category_id = $params['id'];

// Отримуємо дані про категорію та продукти, що належать до неї
    $category = get_category_by_id($category_id);
    $products = get_products_by_category_id($category_id);

    include __DIR__ . '/../view/category-index.php';
}