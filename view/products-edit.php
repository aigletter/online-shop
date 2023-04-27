<?php
/**
 * @var array $product
 * @var array $categories
 */
const DEFAULT_IMAGE = 'images/default-image.jpg';

//if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
//
//    $id = $_POST['id'] ?? '';
//    $name = $_POST['name'] ?? '';
//    $description = $_POST['description'] ?? '';
//    $price = $_POST['price'] ?? '';
//    $category = $_POST['category'] ?? '';
//
//    $res = updateProduct($id, $name, $description, $price, $category);
//
//    if ($res){
//        header("Location: http://online-shop/products/view/id/$id");
//        exit();
//    }
//
//}
?>

<?php include 'partials/head.php' ?>

<?php include 'partials/menu.php' ?>

    <div class="container">
        <h1>Продукт</h1>
        <div class="col py-2">
            <a>Редактирование</a>
        </div>
        <div class="row">
            <div class="container">
                <form action="/products/edit/<?php echo $product['id'];?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div>
                            <input type="hidden" id="id" name="id" value="<?php echo $product['id'] ?>" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="name">Name</label>
                        </div>
                        <div>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Your name.."
                                   value="<?php echo $product['name'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="description">Description</label>
                        </div>
                        <div>
                            <input class="form-control" type="text" id="description" name="description"
                                   placeholder="Your description.." value="<?php echo $product['description'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="description">Price</label>
                        </div>
                        <div>
                            <input class="form-control" type="text" id="price" name="price" placeholder="Your price..."
                                   value="<?php echo $product['price'] ?>" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="category">Category</label>
                        </div>
                        <div>
                            <select id="category" name="category" class="form-control">
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id'] ?>" <?php echo ($category['id'] == $product['category_id']) ? 'selected' : '' ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="btn btn-primary my-4">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include 'partials/footer.php';
