<?php
    require_once('../../isOwner/isOwner.php');
    require_once('../../connectdb/connectiondb.php');
    // insert new client
    $immatriculation = isset($_POST['immatriculation']) ? $_POST['immatriculation'] : "";
    $marque = isset($_POST['marque']) ? $_POST['marque'] : "";
    $modele = isset($_POST['modele']) ? $_POST['modele'] : "";
    $annee = isset($_POST['annee']) ? $_POST['annee'] : "";

    $voitureQuery = "INSERT INTO voitures(numImmatriculation, marque, modele, annee) VALUES(?,?,?,?)";
    $params = array($immatriculation, $marque, $modele, $annee);
    
    $resultVoitureQuery = $conn->prepare($voitureQuery);
    if($resultVoitureQuery->execute($params)) {
        header('location:voitures.php?alert=success_add');
    }
?>