<?php include 'partials/head.php' ?>

<?php include 'partials/menu.php' ?>
<div class="container">
    <?php if (!empty($category)): ?>
        <h1>Категорія "<?php echo $category['name']; ?>"</h1>
        <p><?php echo $category['description']; ?></p>
        <?php if (!empty($products)): ?>
            <h2>Товари, що належать до категорії "<?php echo $category['name']; ?>"</h2>
            <ul>
              <?php foreach ($products as $product): ?>
                <li>
                   <p><a href="/products/view/id/" style="color: black " ><?php echo $product['name'] ?></a></p>
                </li>
              <?php endforeach;?>
            </ul>
        <?php else: ?>
            Немає продуктів в даній категорії
        <?php endif; ?>
    <?php else: ?>
       Відсутня дана категорія
    <?php endif; ?>
</div>

<?php include 'partials/footer.php';?>