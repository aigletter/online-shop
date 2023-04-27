<?php include 'partials/head.php' ?>

<?php include 'partials/menu.php' ?>
<div class="container">
    <?php if (!empty($category)): ?>
        <h1>Категория "<?php echo $category['name']; ?>"</h1>
        <p><?php echo $category['description']; ?></p>
        <?php if (!empty($products)): ?>
            <h2>Товары, относящиеся к категории "<?php echo $category['name']; ?>"</h2>
            <ul>
              <?php foreach ($products as $product): ?>
                <li>
                   <p><a href="/products/view/id/" style="color: black " ><?php echo $product['name'] ?></a></p>
                </li>
              <?php endforeach;?>
            </ul>
        <?php else: ?>
            Нет продуктов в данной категории
        <?php endif; ?>
    <?php else: ?>
        Отсутствует данная категория
    <?php endif; ?>
</div>

<?php include 'partials/footer.php';?>