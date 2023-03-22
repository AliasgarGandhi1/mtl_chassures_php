<?php
    # Include product class
    include 'models/Products.php';
    $productObj = new Products();

    if(isset($_GET['productId']) && !empty($_GET['productId']))
    {
        $productId = $_GET['productId'];
        $product = $productObj->displayRecordById($productId);
    }
?>

<!-- Show description of item selected on product page. -->


<section class="container_product">
       <!-- left column of the container -->
        <div class="left">
            <img class="product-img" src="<?php echo $product['image']; ?>" alt="">
        </div>
        <div class="right">
            <div class="product-description">
                <span class="product-type">Men's Footwear</span>
                <h1 class="product-name"><?php echo $product['name'];?></h1>
                <p class="product-detail">
                    <?php echo $product['description']; ?>
                </p>
            </div>
            
            <div class="product-price">               
                <span class="price">$ <?php echo $product['price']; ?></span>
            </div>
            <div class="product-price">
                <button type="submit" class="btn btn-danger">Add to Cart</button>
                <a href="placeOrder.php?id=<?php echo $product['productId']; ?>" class="btn btn-danger">Buy Now</a>
            </div>
        </div>
    </section>

