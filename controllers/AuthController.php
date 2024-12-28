<?php

require __DIR__ . "/../connectdb/connectiondb.php";
require __DIR__ . "/UserController.php";

class AuthController extends UserController {
    private $password;
    private $confirm_password;

    public function __construct($username, $email, $numberPhone, $address, $password, $confirm_password, $role)
    {

        parent::__construct($username, $email, $numberPhone, $address, $role);
        $this->password = $password;
        $this->confirm_password = $confirm_password;
        $this->role = $role;
    }

    public function register() {
        $db = new DB();
        $conn = $db->connect();

        $result = $conn->prepare("INSERT INTO users(username, email, password, address, numberPhone, role) VALUES(?,?,?,?,?,?)");
        $params = [$this->username, $this->email, password_hash($this->password, PASSWORD_BCRYPT), $this->address, $this->numberPhone, $this->role];

        return $result->execute($params);
    } 

    public function login() {
        $db = new DB();
        $conn = $db->connect();

        $existUser = $conn->query("SELECT username, email, password, role FROM users WHERE email = '$this->email'");
        $resultUser = $existUser->fetch_assoc();

        return $resultUser;
    }
}

?>