<?php
    require_once('../../isLogged/isOwner.php');
    require_once __DIR__ . '/../../controllers/ContratController.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idClient = $_POST['idClient'];
        $immatriculation = $_POST['immatriculation'];
        $dateDebut = $_POST['dateDebut'];
        $dateFin = $_POST['dateFin'];
        $duree = $_POST['duree'];
    
        $contrat = new ContratController();

        if($contrat->CreatContrat($idClient, $immatriculation, $dateDebut, $dateFin, $duree)) {
            header('location:contrats.php?alert=success_add');
        }  
    }

?>