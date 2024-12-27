<?php

require __DIR__ . "/../connectdb/connectiondb.php";

class AuthController {
    public $username;
    public $email;
    public $password;
    public $confirm_password;
    public $address;
    public $numberPhone;
    public $role = 0;

    public function __construct($username, $email, $password, $confirm_password, $address, $numberPhone)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
        $this->address = $address;
        $this->numberPhone = $numberPhone;
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