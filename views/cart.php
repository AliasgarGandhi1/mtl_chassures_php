<?php
    // if(!isset($_SESSION['cart']))
    // {
    //     $_SESSION['cart'] = "";
    // }
    session_start();
    // echo $_SESSION['cart'];

?>


<div class="container">
    <div style="height: 100px;">
    </div>
        <div class="row">
            <?php
                $cart = $_SESSION['cart'];
                foreach ($cart as $item) {
            ?>

            <div class="col-md-4 mb-5" id="card">
            <a href="index.php?page=product_details&productId=<?php echo $item['productId']; ?>">
                <div class="card h-100 shadow">
                <img src="<?php echo $item['image']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item['name']; ?></h5>
                    <p><?php echo $item['description']; ?></p>
                    <p class="card-text"><?php echo $item['price']; ?></p>
                    <a href="cart.php?id=<?php echo $item['productId']; ?>" class="btn btn-danger">Add to Cart</a>
                    <a href="placeOrder.php?id=<?php echo $item['productId']; ?>" class="btn btn-danger">Buy Now</a>
                </div>
                </div>
            </a>
            </div>
            <?php } ?>
        </div>
</div>