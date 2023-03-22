<?php

class Users{

    // Database connection parameters
    private $host = "localhost";
    private $username = "your_username";
    private $password = "your_password";
    private $database = "your_database";
    public $conn;

    public function __construct()
    {
        // Connect to the database
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        // Check if connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function checkCredentials(){
        // Get the input values from the user
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Prepare the SQL statement with placeholders
        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = mysqli_prepare($this->conn, $sql);

        // Bind the parameters to the placeholders
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result set
        $result = mysqli_stmt_get_result($stmt);

        // Check if the query was successful and if the user exists
        if (mysqli_num_rows($result) > 0) {
            // User exists, do something here
            echo "User exists!";
        } else {
            // User does not exist, do something here
            echo "User does not exist!";
        }

        // Close the statement and the database connection
        mysqli_stmt_close($stmt);
        mysqli_close($this->conn);
    }

}

?>