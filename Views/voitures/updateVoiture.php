<?php
    require_once('../../isOwner/isOwner.php');
    require_once('../../connectdb/connectiondb.php');

    if(isset($_POST['idVoiture'])) {
        $getId = $_POST['idVoiture'];

        $numImmatriculation = $_POST['Immatriculation'];
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $annee = $_POST['annee'];

        $params = array($numImmatriculation, $marque, $modele, $annee);

        $queryUpdate = $conn->prepare("UPDATE voitures SET numImmatriculation = ?, marque = ?, modele = ?, annee = ? WHERE id = $getId");

        if($queryUpdate->execute($params)) {
            header('location:voitures.php?alert=success_update');
        }
    }

?>