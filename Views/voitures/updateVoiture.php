<?php
    require_once('../../isOwner/isOwner.php');
    require_once __DIR__.'/../../controllers/VoitureController.php';

    if(isset($_POST['idVoiture'])) {
        $getId = $_POST['idVoiture'];

        $numImmatriculation = $_POST['Immatriculation'];
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $annee = $_POST['annee'];



       $voiture = new VoitureController();
        $updateVoiture = $voiture->updateVoiture($getId, $numImmatriculation, $marque, $modele, $annee);
        if($updateVoiture){
            header('location:voitures.php?alert=success_update');
        }

    }
    

?>