<?php
 # Include product class
 $productObj = new Products();
//  $product="";

 # Edit customer record
 if(isset($_GET['editId']) && !empty($_GET['editId']))
 {
    $editId = $_GET['editId'];
    $product = $productObj->displayRecordById($editId);
 }
 else{
    $product['name'] = "";
    $product['image'] = "";
    $product['description'] = "";
    $product['price'] = "";
    $product['id'] = "";
 }
 # Update record 
 if(isset($_POST['update']))
 {
    $productObj->updateRecord($_POST);
 }
?>

<div class="card text-center" style="padding: 15px;">
        <h3>Change or Delete Shoes Details</h3>
</div><br>
    <div class="container">
        <form action="<?php $_PHP_SELF ?>" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name ="name" placeholder="Enter name" value="<?php echo $product['name'] ?>" required="">
            </div>
            <div class="form-group">
                <label for="image">Select Image:</label>
                <input type="file" class="form-control" name ="image" value="<?php echo $product['image'] ?>" required="">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name ="description" placeholder="Enter description" value="<?php echo $product['description'] ?>" required="">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name ="price" placeholder="Enter Price" value="<?php echo $product['price'] ?>" required="">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" style="width: 50px; position:fixed;" name ="id" value="<?php echo $product['id'] ?>">
                <input type="submit" name="update" class="btn btn-primary" style="float:right; margin-top:5px; padding-right:15px;" value="Update">
                <input type="submit" name="delete" class="btn btn-primary" style="float:right; margin-top:5px; margin-right:15px;" value="Delete">
            </div>
        </form>
        <div style="height: 100px;"></div>
    </div>