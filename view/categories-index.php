<?php include __DIR__ . '/partials/head.php' ?>

<?php include __DIR__ . '/partials/menu.php' ?>

    <div class="container">
        <h1>Категории</h1>
        <div class="col py-2">
            <a href="/categories/add">Добавить категорию</a>
        </div>
        <div class="row">
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <div class="card" style="width: 18rem; margin: 10px;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/category/view/id/<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a>
                            </h5>
                            <p class="card-text">
                                <?php echo $category['description'] ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                Нет продуктов
            <?php endif; ?>
        </div>
    </div>

<?php include __DIR__ . '/partials/footer.php';