SELECT categories.name AS category_name, COUNT(products.id) AS product_count
FROM categories
LEFT JOIN products
ON categories.id = products.category_id
GROUP BY categories.id