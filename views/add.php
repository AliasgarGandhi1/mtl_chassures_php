<?php
 # Include product class
 $productObj1 = new Products();
 # Insert record into customer table
 if(isset($_POST['submit']))
 {
    $productObj1->insertData($_POST);
 }
?>

<div class="card text-center" style="padding: 15px;">
        <h3>Add Product in Object Oriented PHP</h3>
    </div><br>
    <div class="container">
        <form action="<?php $_PHP_SELF ?>" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name ="name" placeholder="Enter name" required="">
            </div>
            <div class="form-group">
                <label for="image">Select Image:</label>
                <input type="file" class="form-control" name ="image" required="">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name ="description" placeholder="Enter description" required="">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name ="price" placeholder="Enter Price" required="">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" style="float:right; margin-top:5px" value="Submit">
        </form>
        <div style="height: 100px;"></div>
    </div>