<?php
include 'partials/head.php' ?>

<?php include 'partials/menu.php' ?>

    <div class="container">
        <h1>
            Add new product
        </h1>
        <form method="post" enctype="multipart/form-data" action="/controller/add-controller.php">
            <div class="mb-3">
                <label for="productTitle" class="form-label">Product Title</label>
                <input type="text" class="form-control" id="productTitle" name="productTitle">
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Product Description</label>
                <textarea class="form-control" id="productDescription" rows="3" name="productDescription"></textarea>
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Product Price</label>
                <input type="text" class="form-control" id="productPrice" name="productPrice">
            </div>
            <div class="mb-3">
                <label for="productImage" class="form-label">Product Image</label>
                <input type="file" id="productImage" class="form-control" name="image" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="catId" class="form-label">Category:</label>
                <select name="catId" id="catId">
                    <?php if ($categories): ?>
                        <?php foreach($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?> </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

<?php include 'partials/footer.php';

