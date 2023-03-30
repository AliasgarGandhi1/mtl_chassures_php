<?php
    include 'models/Products.php';

    $product = new Products();
    if (isset($_GET['deleteId'])) {
        $deleteId = $_GET['deleteId'];
        if(isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array_filter($_SESSION['cart'], function($value) use ($deleteId) {
                return $value != $deleteId;
            });
        }
    }
?>


<div class="container">
    <div style="height: 100px;">
    </div>
    <?php
        if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
            $cart = $_SESSION['cart'];
    ?>
    <table class="table table-hover">
        <thead>
            <th>Sr. No.</th>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th></th>
        </thead>
        <tbody>
    <?php
        $cnt = 0; 
        foreach ($cart as $item) {
        $items = $product->displayRecordById($item);
        if (!empty($items)) {
            $cnt++;
            
    ?>
            <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $items['name']; ?></td>
                <td><img src="<?php echo $items['image']; ?>" style="width: 150px;" class="card-img-top" alt="..."></td>
                <td><?php echo $items['description']; ?></td>
                <td>$<?php echo $items['price']; ?></td>
                <td>
                    &nbsp&nbsp&nbsp
                    <a href="index.php?page=cart&deleteId=<?php echo $items['productId'];?>" style="color:red;" ><i class="fa fa-trash" aria-hidden="true"></i></td></a>
            </tr>
    <?php }}?>
    </tbody>
    </table>
    <div class="text-center container"><a href="placeOrder.php?id=<?php echo $items['productId']; ?>" class="btn col-md-6 btn-success">Place Order</a></div>
    <div style="height: 100px;"></div>
    <?php 
        }
        else {
    ?>
    <div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<img src="./Images/bgimages/emptycart.gif" alt="" height="250vh" width="300vh" srcset=""/>
				<h1>Your cart is empty</h1>
				<p>Looks like you haven't added anything to your cart yet. Start shopping now!</p>
				<a href="index.php" class="btn btn-primary">Shop Now</a>
			</div>
		</div>
	</div>
    <div style="height: 100px;">
    </div>
    <?php } ?>
</div>