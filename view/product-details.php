<?php
/**
 * @var array $product
 */
const DEFAULT_IMAGE = '../images/default-image.png'
?>

<?php include 'partials/head.php' ?>

<?php include 'partials/menu.php' ?>

<div style="width: 80%; margin-left: 10%">
    <div style="width: 40%; display: inline-block">
        <div style="width: 100%">
            <img src="<?php echo $product['image']?? DEFAULT_IMAGE ?>" width="100%">
        </div>
    </div>
    <div style="width: 50%; margin-left: 2%; display: inline-block; ">
        <div>
            <h1><?php echo $product['name']?? "Lenovo h312"?></h1>
        </div>
        <div>
            <h3 style="color: gray"><?php echo $product['price']?? "25000"?> uah</h3>
        </div>
        <div>
            <?php echo $product['description']?? "test notebook"?>
        </div>
    </div>
    <a href="/products/update/id/<?php echo $product['id']?>" ><button class="button">Редактировать</button></a>
</div>


<?php include 'partials/footer.php';