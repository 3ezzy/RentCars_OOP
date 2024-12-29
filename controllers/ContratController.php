<?php
require_once __DIR__ . '/../connectdb/connectiondb.php';

class ContratController
{

    public function getAllContrats()
    {
        $db = new DB();
        $conn = $db->connect();
        $sql = "SELECT contrats.*, users.username, voitures.numImmatriculation FROM ((contrats 
                INNER JOIN users ON contrats.numClient = users.id)
                INNER JOIN voitures ON contrats.numVoiture = voitures.id)";
        $result = $conn->query($sql);

        if ($result === false) {
            return ['error' => $conn->error];
        }

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function CreatContrat($numClient, $numVoiture, $dateDebut, $dateFin, $duree)
    {
        $db = new DB();
        $conn = $db->connect();
        $sql = "INSERT INTO contrats(numClient, numVoiture, dateDebut, dateFin, duree) VALUES(?,?,?,?,?)";
        $result = $conn->prepare($sql);
        $params = [$numClient, $numVoiture, $dateDebut, $dateFin, $duree];

        return $result->execute($params);
    }


    public function getContratById($id)
    {
        $db = new DB();
        $conn = $db->connect();
        $sql = "SELECT * FROM contrats WHERE id = $id";
        $result = $conn->query($sql);

        if ($result === false) {
            return ['error' => $conn->error];
        }

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return [];
        }
    }

    public function updateContrat($id, $numClient, $numVoiture, $dateDebut, $dateFin, $duree)
    {
        $db = new DB();
        $conn = $db->connect();
        $sql = "UPDATE contrats SET numClient = ?, numVoiture = ?, dateDebut = ?, dateFin = ?, duree = ? WHERE id = ?";
        $result = $conn->prepare($sql);

        $params = [$numClient, $numVoiture, $dateDebut, $dateFin, $duree, $id];

        return $result->execute($params);
    }


    public function deleteContrat($id)
    {
        $db = new DB();
        $conn = $db->connect();
    
        $result = $conn->prepare("DELETE FROM contrats WHERE id = ?");

        $result->bind_param('i', $id);

        if ($result === false) {
            return ['error' => $conn->error];
        }

        return $result->execute();
    }
}
