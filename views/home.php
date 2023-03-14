<?php
    # Include product class
    include 'models/Products.php';
    $productObj = new Products();
?>

<div class="jumbotron jumbotron-fluid">
        <div class="container">
        <h1 class="display-4">New Collection</h1>
        <p class="lead">Shop our latest collection of shoes.</p>
        <a class="btn btn-primary" href="#" role="button">Shop Now</a>
        </div>
</div>
<div class="container">
    <div class="row">
        <?php
            $products = $productObj->displayData();
            foreach ($products as $product) {
        ?>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
            <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                <p><?php echo $product['description']; ?></p>
                <p class="card-text">$<?php echo $product['price']; ?></p>
                <a href="cart.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Add to Cart</a>
                <a href="placeOrder.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Buy Now</a>
            </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>    
