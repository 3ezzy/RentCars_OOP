<?php 
    require_once __DIR__ . '/../connectdb/connectiondb.php';

class ClientController {

    public function index() {
        $db = new DB();

        $conn = $db->connect();

        $result = $conn->query("SELECT * FROM users");
        
        return $result->fetch_all(MYSQLI_ASSOC);
    } 
}

?>
