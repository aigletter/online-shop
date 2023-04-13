<?php
/**
 * @var array $users
 */
const DEFAULT_IMAGE = 'images/default-image.jpg'
?>
<html>
<head>
    <title></title>
    <style>
        table td, table th {
            border: 1px solid black;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="content">
    <div class="container">
        <div class="row">
            <h1>Продукты</h1>
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="card" style="width: 18rem; margin: 10px;">
                        <img src="<?php echo $product['image'] ?? DEFAULT_IMAGE ?>" class="card-img-top"
                             alt="<?php echo $product['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/products/view/id/<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a>
                            </h5>
                            <p class="card-text">
                                <?php echo $product['description'] ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                Нет продуктов
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>