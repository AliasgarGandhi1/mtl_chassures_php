<?php
    # Include product class
    include 'models/Products.php';
    $productObj = new Products();
?>

<div class="jumbotron jumbotron-fluid">
        <div class="container">
        <div><h1 class="display-4">New Collection</h1></div>
        <p class="lead">Shop our latest collection of shoes.</p>
        <a class="btn btn-danger" href="./index.php?page=products" role="button">Shop Now</a>
        </div>
</div>
<div class="container">
    <div style="height: 100px;">
    </div>
        <div class="row">
            <?php
                    $products = $productObj->displayData();
                    foreach ($products as $product) {
            ?>

            <div class="col-md-4 mb-5" id="card">
            <a href="index.php?page=product_details&productId=<?php echo $product['productId']; ?>">
                <div class="card h-100 shadow">
                <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <div>
                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                    <p><?php echo $product['description']; ?></p>
                    <p class="card-text"><?php echo $product['price']; ?></p>
                    </div>
                    </a>
                    <div>
                    <button type="submit" class="btn btn-danger">Add to Cart</button>
                    <a href="placeOrder.php?id=<?php echo $product['productId']; ?>" class="btn btn-danger">Buy Now</a>
                    </div>
                </div>
                </div>
            </div>
            <?php } ?>
        </div>
</div>
  
