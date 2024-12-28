<?php
    require_once __DIR__ . '/../connectdb/connectiondb.php';
    require_once __DIR__ . '/UserController.php';
class UserManager extends UserController {
    private $id;

    public function __construct($username, $email, $address, $numberPhone, $role, $id)
    {
        parent::__construct($username, $email, $address, $numberPhone, $role);
        $this->id = $id;
    }
    
    public function show() {
        $db = new DB();
        $conn = $db->connect();
        $result = $conn->query("SELECT id, username, email, address, numberPhone FROM users WHERE id = $this->id");

        return $result->fetch_assoc();
    }

    public function update() {
        $db = new DB();
        $conn = $db->connect();
       
        $update = $conn->prepare("UPDATE users SET username = ?, email = ?, address = ?, numberPhone = ? WHERE id = ?");
        $update->bind_param("ssssi", $this->username, $this->email, $this->address, $this->numberPhone, $this->id);

        return $update->execute();
    }
}
?>