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

    public function CreatVoiture($numImmatriculation, $marque, $modele, $annee) {
        $db = new DB();
        $conn = $db->connect();
        $sql = "INSERT INTO voitures(numImmatriculation, marque, modele, annee) VALUES(?,?,?,?)";
        $result = $conn->prepare($sql);
        $params = [$numImmatriculation, $marque, $modele, $annee];

        return $result->execute($params);
    }

    public function getVoitureById($id) {
        $db = new DB();
        $conn = $db->connect();
        $sql = "SELECT * FROM voitures WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return [];
        }
    }

    public function updateVoiture($id, $numImmatriculation, $marque, $modele, $annee) {
        $db = new DB();
        $conn = $db->connect();
        $sql = "UPDATE voitures SET numImmatriculation = ?, marque = ?, modele = ?, annee = ? WHERE id = $id";
        $result = $conn->prepare($sql);
        $params = [$numImmatriculation, $marque, $modele, $annee];

        return $result->execute($params);
    }

}





?>