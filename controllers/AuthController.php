<?php

require __DIR__ . "/../connectdb/connectiondb.php";

class AuthController {

    public function register($username, $email, $address, $numberPhone, $password, $confirm_password, $role) {
        $db = new DB();
        $conn = $db->connect();

        $result = $conn->prepare("INSERT INTO users(username, email, password, address, numberPhone, role) VALUES(?,?,?,?,?,?)");
        $params = [$username, $email, password_hash($password, PASSWORD_BCRYPT), $address, $numberPhone, $role];

        return $result->execute($params);
    } 

    public function login($email, $password) {
        $db = new DB();
        $conn = $db->connect();

        $existUser = $conn->query("SELECT * FROM users WHERE email = '$email'");

        $resultUser = $existUser->fetch_assoc();

        return $resultUser;
        

    }
}

?>