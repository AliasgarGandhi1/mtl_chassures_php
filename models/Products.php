<?php

require_once 'db.php';

class Products
{
    private $db;

    # Member functions

    # Database Connection in the constructor
    public function __construct()
    {
        $this->db = new DB();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    # Insert product data into product table
    public function insertData($post)
    {
        $name = $_POST['name'];
        $fileName = $_FILES['image']['name'];        
        $image = 'Images\\'.$fileName;
        $description = $_POST['description'];
        $price = $_POST['price'];
        $sql = "INSERT INTO products(name, image, description, price) 
                            VALUES(?, ?, ?, ?)";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $image, $description, $price);

        if($stmt->execute()){
            header("Location:admin_index.php?msg1=insert");
        }
        else {
            echo 'Failed to insert';
        }
    }

    # fetch customer records for listing
    public function displayData()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $data = array();
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
        else 
        {
            echo "No records found";
        }
    }

    public function searchRecords($get)
    {
        $query = $_GET['query'] ?? '';
        $sort = $_GET['sort'] ?? 'price_asc';

        $where = "WHERE name LIKE '%$query%'";
       

        $order_by = '';
        if ($sort === 'price_asc') {
            $order_by = 'ORDER BY price ASC';
        } elseif ($sort === 'price_desc') {
            $order_by = 'ORDER BY price DESC';
        } elseif ($sort === 'name_asc') {
            $order_by = 'ORDER BY name ASC';
        } elseif ($sort === 'name_desc') {
            $order_by = 'ORDER BY name DESC';
        }

        $query = "SELECT * FROM products $where $order_by";
       
        $result = $this->db->conn->query($query);

        // Display search results
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "Records not found.";
        }

        
    }

    # fetch single customer record for editing, etc..
    public function displayRecordById($id)
    {
        $sql = "SELECT * FROM products WHERE productId = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
        else 
        {
            
        }
    }

    # Update customer data
    public function updateRecord($post)
    {
        $name = $_POST['name'];
        $fileName = $_FILES['image']['name'];
        $image = '\\Images\\'.$fileName;
        $description = $_POST['description'];
        $price = $_POST['price'];
        $id = $_POST['id'];
        if(!empty($id) &&!empty($post))
        {
            $sql = "UPDATE products SET name = '?', image = '?', description= '?', price = '?'
                                            WHERE id = '?'";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $image, $description, $price, $id);
            $stmt->execute();
            $stmt->close();
            if($sql==true){
                header("Location:admin_index.php?msg2=update");
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
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0)
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