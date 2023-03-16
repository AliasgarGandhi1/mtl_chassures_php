<?php

class Products
{
    # Member variables
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'transweb';
    public $con;

    # Member functions

    # Database Connection in the constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password,$this->database);
        if(mysqli_connect_error())
        {
            trigger_error("failed to connect to MySQL: ". mysqli_connect_error());
        }
        else
        {
            return $this->con;
        }
    }
    # Insert product data into product table
    public function insertData($post)
    {
        $name = $_POST['name'];
        $fileName = $_FILES['image']['name'];        
        $image = './Images/'.$fileName;
        $description = $_POST['description'];
        $price = $_POST['price'];
        $query = "INSERT INTO products(name, image, description, price) 
                            VALUES('$name', '$image', '$description', '$price')";
        $sql = $this->con->query($query);
        if($sql==true){
            header("Location:admin_index.php?msg1=insert");
        }
        else {
            echo 'Failed to insert';
        }
    }

    # fetch customer records for listing
    public function displayData()
    {
        $query = "SELECT * FROM products";
        $result = $this->con->query($query);
        if($result->num_rows > 0)
        {
            $data = array();
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
        else 
        {
            echo "No found records";
        }
    }

    # fetch single customer record for editing, etc..
    public function displayRecordById($id)
    {
        $query = "SELECT * FROM products WHERE id = '$id'";
        $result = $this->con->query($query);
        if($result->num_rows > 0)
        {           
            $row = $result->fetch_assoc(); 
            return $row;
        }
        else 
        {
            echo "Record not found";
        }
    }

    # Update customer data
    public function updateRecord($post)
    {
        $name = $_POST['name'];
        $fileName = $_FILES['image']['name'];
        $image = './Images/'.$fileName;
        $description = $_POST['description'];
        $price = $_POST['price'];
        $id = $_POST['id'];
        if(!empty($id) &&!empty($post))
        {
            $query = "UPDATE products SET name = '$name', image = '$image', description= '$description', price = '$price'
                                            WHERE id = '$id'";
            $sql = $this->con->query($query);
            if($sql==true){
                header("Location:admin_index.php?msg2=update");;
            }
            else 
            {
                echo "Failed to update";    
            }

        }

    }

    # Delete a specific customer
    public function deleteRecord($id)
    {
        $query = "DELETE FROM products WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql==true)
        {
            header("Location:admin_index.php?msg3=delete");
        }
        else 
        {
            echo "Failed to delete";
        }
    } 
}
?>