<br><br><br>
    <div>
        <h2>View Records
            <a href="admin_index.php?page=add" class="btn btn-primary" style="float:right;">Add New Record</a>
        </h2>
    
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
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><img src="<?php echo $product['image']; ?>" style="width: 150px;" class="card-img-top" alt="..."></td>
                <td><?php echo $product['description']; ?></td>
                <td>$<?php echo $product['price']; ?></td>
                <td>
                    <a href="admin_index.php?page=edit&editId=<?php echo $product['id'];?>" style="color:green"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    &nbsp&nbsp&nbsp
                    <a href="admin_index.php?page=delete&deleteId=<?php echo $product['id'];?>" style="color:red;" ><i class="fa fa-trash" aria-hidden="true"></i></td></a>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>