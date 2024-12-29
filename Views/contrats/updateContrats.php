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
