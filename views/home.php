<?php
    # Include product class
    include 'models/Products.php';
    include 'models/Users.php';
    $productObj = new Products();
    $user = new Users();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user->logout();
    }
?>
<div class="text-right">
    <?php 
        if(isset($_SESSION['user'])) { 
            echo '<form action="index.php?login=false" method="post">
            <lable>Welcome '  .$_SESSION["user"] . '</lable>
            <button class="btn-danger" name="logout" type="submit">Logout</button>
            </form>';
        }
        else {
            echo '<form action="index.php?login=true" method="post">
            <button class="btn-success"><a class="btn-success" name="login" href="views/login.php">Log In</a></button>
            </form>';
        }
    ?>
</div>
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
                        if(!empty($product)){

            ?>

            <div class="col-md-4 mb-5" id="card">
            <a href="index.php?page=product_details&productId=<?php echo $product['productId']; ?>">
                <div class="card h-100 shadow">
                <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <div>
                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                    <p><?php echo $product['description']; ?></p>
                    <p class="card-text">$ <?php echo $product['price']; ?></p>
                    </div>
                    </a>
                    <div>
                    <button type="submit" class="btn btn-danger">Add to Cart</button>
                    <a href="placeOrder.php?id=<?php echo $product['productId']; ?>" class="btn btn-danger">Buy Now</a>
                    </div>
                </div>
                </div>
            </div>
            <?php }
                else { ?>
                    <div>
                        <h5 class="card-title">No Products.</h5>
                    </div>
            <?php
                }
            }
            ?>
        </div>
</div>
  
