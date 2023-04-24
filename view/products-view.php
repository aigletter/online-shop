<?php
/**
 * @var array $product
 * @var array $category
 */
const DEFAULT_IMAGE = 'images/default-image.jpg'
?>

<?php include 'partials/head.php' ?>

<?php include 'partials/menu.php' ?>

    <div class="container">
        <h1>Продукт</h1>
        <div class="col py-2">
            <a href="<?php echo '../../edit/'.$product[0] ?>">Редактировать продукт</a>
        </div>
        <div class="row">
            <?php if (!empty($product)): ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category(Description)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row"><?php echo $product[0] ?></th>
                        <td><?php echo $product[1] ?></td>
                        <td><?php echo $product[2] ?></td>
                        <td><?php echo $product[3] ?></td>
                        <td><?php echo $category['name'] .' ('.$category['description'].')' ?></td>
                    </tr>
                    </tr>
                    </tbody>
                </table>
            <?php else: ?>
                Нет продуктов
            <?php endif; ?>
        </div>
    </div>

<?php include 'partials/footer.php';
