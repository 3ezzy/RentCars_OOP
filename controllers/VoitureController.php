<?php 
require __DIR__ . '/../connectdb/connectiondb.php';



class VoitureController {

    

    public function getAllVoitures() {
        $db = new DB();
        $conn = $db->connect();
        $sql = "SELECT * FROM voitures";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return []; 
        }
    }

}


?>