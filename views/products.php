<?php
    # Include product class
    include './models/Products.php';
    $productObj = new Products();

    if(!isset($_SESSION['cart']))
    {
        $_SESSION['cart'] = array();
    }
   if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['cart']))
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">                
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <form action="index.php?page=products" class="d-flex" method="GET">
                        <input type=text name=page value="products" hidden=true>
                        <select class="form-control me-2" name="sort" label="Sort by:">
                                    <option class="dropdown-item" value="price_asc">Price: Low to High</option>
                                    <option class="dropdown-item" value="price_desc">Price: High to Low</option>
                                    <option class="dropdown-item" value="name_asc">Name: A to Z</option>
                                    <option class="dropdown-item" value="name_desc">Name: Z to A</option>
                                </select>
                    <input class="form-control me-2" name="query" type="text" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
        <div class="row">
            <?php
                    if(isset($_GET['submit']))
                    {  
                       $products=$productObj->searchRecords($_GET);           
                    }
                    else
                    {
                        $products = $productObj->displayData();
                    }
                    foreach ($products as $product) {
            ?>

            <div class="col-md-4 mb-5" id="card">
            <a href="index.php?page=product_details&productId=<?php echo $product['productId']; ?>">
                <div class="card h-100 shadow">
                <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <div>
                    <form action="index.php" method="get">
                    <input type="hidden" name="page" value="products">
                        <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                    <p><?php echo $product['description']; ?></p>
                    <p class="card-text">$ <?php echo $product['price']; ?></p>
                    </div>
                    </a>
                    <div>
                        <button type="submit" name="cart"class="btn btn-danger">Add to Cart</button>
                    </form>
                    <a href="placeOrder.php?id=<?php echo $product['productId']; ?>" class="btn btn-danger">Buy Now</a>
                    </div>
                </div>
                </div>
            </div>
            <?php } ?>
        </div>
</div>

