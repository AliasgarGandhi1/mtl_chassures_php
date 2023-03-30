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
</div><br><br>
    <div>
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
                    <input class="form-control me-4" name="query" type="text" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    
    <table class="table table-hover">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
                $products = $productObj->displayData();
                foreach ($products as $product) {
            ?>
            <tr>
                <td><?php echo $product['productId']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><img src="<?php echo $product['image']; ?>" style="width: 150px;" class="card-img-top" alt="..."></td>
                <td><?php echo $product['description']; ?></td>
                <td>$<?php echo $product['price']; ?></td>
                <td>
                    <a href="admin_index.php?page=edit&editId=<?php echo $product['productId'];?>" style="color:green"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    &nbsp&nbsp&nbsp
                    <a href="admin_index.php?page=delete&deleteId=<?php echo $product['productId'];?>" style="color:red;" ><i class="fa fa-trash" aria-hidden="true"></i></td></a>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>