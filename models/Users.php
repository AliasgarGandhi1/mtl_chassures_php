<?php
require_once 'db.php';

class Users{

    private $db;

    public function __construct()
    {
        $this->db = new DB();
        session_start();
    }

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }

        $stmt->close();
        return null;
    }

    public function checkUserName($userName) {
        $sql = "SELECT userName FROM users WHERE userName = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }

        $stmt->close();
        return null;
    }

    public function getUserId() {
        $sql = "SELECT userId FROM users ORDER BY userId DESC LIMIT 1";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }

        $stmt->close();
        return null;
    }

    public function addUser($userName, $email, $password, $customerName, $phoneNo, $address, $postalCode, $city, $state, $country) {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("sss", $userName, $password, $email);
        $stmt->execute();

        $userId = $this->getUserId();

        $sql = "INSERT INTO customes (customerName, phoneNo, address, postalCode, city, state, country, email, userId) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("sss", $customerName, $phoneNo, $address, $postalCode, $city, $state, $country, $email, $userId);
        $stmt->execute();
        
        $stmt->close();
    }

    public function setRememberToken($email, $cookieID) {
        $sql = "UPDATE users SET cookieID = ? WHERE email = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("ss", $cookieID, $email);
        $stmt->execute();
        $stmt->close();
    }

    public function clearRememberToken($email) {
        $sql = "UPDATE users SET cookieID = NULL WHERE email = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("ss", $cookieID, $email);
        $stmt->execute();
        $stmt->close();
    }
}

?>