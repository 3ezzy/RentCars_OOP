<?php
    require_once('../../isLogged/isOwner.php');
    require_once __DIR__.'/../../controllers/VoitureController.php';

    if(isset($_POST['idVoiture'])) {
        $getId = $_POST['idVoiture'];

        $numImmatriculation = $_POST['Immatriculation'];
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $annee = $_POST['annee'];
        $priceHour = $_POST['priceHour'];
        $imageCar = $_FILES['imageCar']['name'];
        $tempName = $_FILES['imageCar']['tmp_name'];
        $folder = '../../src/img/cars/' . $imageCar;



        if(move_uploaded_file($tempName, $folder)) {
            $voiture = new VoitureController();
            $updateVoiture = $voiture->updateVoiture($getId, $numImmatriculation, $marque, $modele, $annee, $priceHour, $imageCar);
            if($updateVoiture){
                header('location:voitures.php?alert=success_update');
            }
        }

    }
    

?>