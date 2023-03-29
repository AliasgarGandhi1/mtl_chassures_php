<?php
require_once 'db.php';

class Users{

    private $db;
    private $loggedInUser = null;

    public function __construct()
    {
        $this->db = new DB();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->checkLogin();
    }

    //Fetch user details from databse using thier email.
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

    // Check the userName of the user if it already exist or not.
    public function checkUserName($userName) {
        $sql = "SELECT userName FROM users WHERE userName = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("s", $userName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return true;
        }

        $stmt->close();
        return false;
    }

    // Returns the userId of the last inserted record in table.
    public function getUserId() {
        $sql = "SELECT userId FROM users ORDER BY userId DESC LIMIT 1";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
        return null;
    }

    //This function used to add the user/customer information in the database.
    public function addUser($post, $password) {

        $userName = $post['userName'];
        $email = $post['email'];
        $password = $password;
        $customerName = $post['name'];
        $phoneNo = $post['phoneNo'];
        $address = $post['address'];
        $postalCode = $post['postalCode'];
        $city = $post['city'];
        $state = $post['state'];
        $country = $post['country'];

        $sql = "INSERT INTO users (userName, email, password) VALUES (?, ?, ?)";
        $stmt1 = $this->db->conn->prepare($sql);
        $stmt1->bind_param("sss", $userName, $email, $password);
        $stmt1->execute();

        $userId = 1;
        $userId = implode("", $this->getUserId());

        $sql = "INSERT INTO customers (customerName, phoneNo, address, postalCode, city, state, country, email, userId) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt2 = $this->db->conn->prepare($sql);
        $stmt2->bind_param("sssssssss", $customerName, $phoneNo, $address, $postalCode, $city, $state, $country, $email, $userId);

        if($stmt2->execute()) {
            echo "<script>alert('Record added successfully.');</script>";
            return true;
        } else {
            echo "error";
            return false;
        }
    }

    // Used to check whether the user entered right credentils or not.
    public function login($email, $password, $rememberMe = false) {
        $user = $this->getUserByEmail($email);
        if (!$user) {
            return false; // User not found
        }
        if (!password_verify($password, $user['password'])) {
            return false; // Incorrect password
        }
        $this->setLoggedInUser($user);
        if ($rememberMe) {
            $this->setLoginCookie();
        }
        return true; // User logged in successfully
    }

    public function logout() {
        $this->clearLoggedInUser();
        $this->clearLoginCookie();
        session_destroy();
    }

    public function isLoggedIn() {
        return $this->loggedInUser != null;
    }

    public function getLoggedInUser() {
        return $this->loggedInUser;
    }

    private function checkLogin() {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $this->loggedInUser = $user;
        } elseif (isset($_COOKIE['login'])) {
            $login = $_COOKIE['login'];
            $parts = explode(':', $login);
            if (count($parts) == 2) {
                list($email, $cookieID) = $parts;
                $user = $this->getUserByEmail($email);
                if ($user && password_verify($cookieID, $user['cookieID'])) {
                    $this->setLoggedInUser($user);
                }
            }
        }
    }

    private function setLoggedInUser($user) {
        $this->loggedInUser = $user;
        $_SESSION['user'] = $user['userName'];
    }

    private function clearLoggedInUser() {
        $this->loggedInUser = null;
        unset($_SESSION['user']);
    }

    private function setLoginCookie() {
        $email = $this->loggedInUser['email'];
        //Here we can use the random numbers as well to generete tokens.
        $cookieID = password_hash($email, PASSWORD_DEFAULT);
        $this->setRememberToken($email, $cookieID);
        $cookie = "$email:$cookieID";
        setcookie('login', $cookie, time() + (720 * 3600), '/');
    }

    private function clearLoginCookie() {
        if (isset($_COOKIE['login'])) {
            $email = $this->loggedInUser['email'];
            $this->clearRememberToken($email);
            setcookie('login', '', time() - 3600, '/');
        }
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
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->close();
    }
}

?>