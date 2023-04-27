<?php

function index()
{
    require_once __DIR__ . '/../model/categories-model.php';

    $categories = getCategories();

    include __DIR__ . '/../view/categories-index.php';
}