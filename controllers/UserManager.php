<?php
    require_once __DIR__ . '/../connectdb/connectiondb.php';
class UserManager {
    private $id;
    private $username;
    private $email;
    private $address;
    private $numberPhone;
    private $tableName;

    
    public function show($id) {
        $db = new DB();
        $conn = $db->connect();
        $result = $conn->query("SELECT id, username, email, address, numberPhone FROM users WHERE id = $id");

        return $result->fetch_assoc();
    }

    public function update($username, $email, $address, $numberPhone, $id) {
        $db = new DB();
        $conn = $db->connect();
       
        $update = $conn->prepare("UPDATE users SET username = ?, email = ?, address = ?, numberPhone = ? WHERE id = ?");
        $update->bind_param("ssssi", $username, $email, $address, $numberPhone, $id);

        return $update->execute();
    }

    public function destroy($id) {
        $db = new DB();
        $conn = $db->connect();
       
        $destroy = $conn->prepare("DELETE FROM users WHERE id = ?");
        $destroy->bind_param("i", $id);

        return $destroy->execute();
    }

    public function countRows($tableName) {
        $db = new DB();
        $conn = $db->connect();
        $sql = "SELECT * FROM $tableName";
        $result = $conn->query($sql);

        return $result->num_rows;
    }
}
?>