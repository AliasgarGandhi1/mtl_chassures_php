<?php
    # Include product class
    include './models/Products.php';
    $productObj = new Products();

    if(!isset($_SESSION['cart']))
    {
        $_SESSION['cart'] = array();
    }
   if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['submit']))
   {
        if(isset($_GET['productId']))
        {
            $product = $_GET['productId'];
            array_push($_SESSION['cart'], $product); 
        }
        else{
            echo "Product Id not found.";
        }
   }
?>

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
                    <form action="index.php?page=products&productId=<?php echo $product['productId']; ?>" method="get">
                        <input type="hidden" name="productId" value="// echo $product['productId']; ?>">
                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                    <p><?php echo $product['description']; ?></p>
                    <p class="card-text">$ <?php echo $product['price']; ?></p>
                    </div>
                    </a>
                    <div>
                        <button type="submit" class="btn btn-danger">Add to Cart</button>
                    </form>
                    <a href="placeOrder.php?id=<?php echo $product['productId']; ?>" class="btn btn-danger">Buy Now</a>
                    </div>
                </div>
                </div>
            </div>
            <?php } ?>
        </div>
</div>

