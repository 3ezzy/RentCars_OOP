<?php
require_once('../../isLogged/isOwner.php');
require __DIR__ . '/../../controllers/ContratController.php';

if (isset($_POST['idContrat'])) {
    $id = $_POST['idContrat'];
    $numClient = $_POST['idClient'];
    $numVoiture = $_POST['idVoiture'];
    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    $duree = $_POST['duree'];
    $contrat = new ContratController();
    $updateContrat = $contrat->updateContrat($id, $numClient, $numVoiture, $dateDebut, $dateFin, $duree);
    if ($updateContrat) {
        header('location:contrats.php?alert=success_update');
    }
}







// $idContrat = isset($_POST['idContrat']) ? $_POST['idContrat'] : 0;

// $idClient = isset($_POST['idClient']) ? $_POST['idClient'] : 0;
// $idVoiture = isset($_POST['idVoiture']) ? $_POST['idVoiture'] : 0;
// $dateDebut = isset($_POST['dateDebut']) ? $_POST['dateDebut'] : "";
// $dateFin = isset($_POST['dateFin']) ? $_POST['dateFin'] : "";
// $duree = isset($_POST['duree']) ? $_POST['duree'] : "";


// $resultEdit = $conn->prepare("UPDATE contrats SET numClient = ?, numVoiture = ?, dateDebut = ?, dateFin = ?, duree = ? WHERE id = ?");
// $params = array($idClient, $idVoiture, $dateDebut, $dateFin, $duree, $idContrat);
// var_dump($params);


// if($resultEdit->execute($params)) {
//     header('location:contrats.php?alert=success_update');
// }
