SELECT products.*, categories.name AS category_name
FROM products
INNER JOIN categories
ON products.category_id = categories.id;