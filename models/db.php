<?php

class DB {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'mtl_chassures';
    public $conn = null;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // public function query($sql, $params = []) {
    //     $stmt = $this->conn->prepare($sql);

    //     if (!$stmt) {
    //         die("Prepare statement failed: " . $this->conn->error);
    //     }

    //     if (!empty($params)) {
    //         $types = str_repeat('s', count($params));
    //         $stmt->bind_param($types, ...$params);
    //     }

    //     $result = $stmt->execute();

    //     if (!$result) {
    //         die("Query error: " . $stmt->error);
    //     }

    //     $result = $stmt->get_result();

    //     if (!$result) {
    //         die("Get result error: " . $stmt->error);
    //     }

    //     return $result;
    // }
}