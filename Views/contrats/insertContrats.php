<?php
    require_once('../../isOwner/isOwner.php');
    require_once('../../connectdb/connectiondb.php');

    $nameClient = isset($_POST['nameClient']) ? $_POST['nameClient'] : "";
    $immatriculation = isset($_POST['immatriculation']) ? $_POST['immatriculation'] : "";
    $dateDebut = isset($_POST['dateDebut']) ? $_POST['dateDebut'] : "";
    $dateFin = isset($_POST['dateFin']) ? $_POST['dateFin'] : "";
    $duree = isset($_POST['duree']) ? $_POST['duree'] : "";

    $queryContrats = "INSERT INTO contrats(numClient, numVoiture, dateDebut, dateFin, duree) VALUES(?,?,?,?,?)";
    $params = array($nameClient, $immatriculation, $dateDebut, $dateFin, $duree);
    $resultContrats = $conn->prepare($queryContrats);

    if($resultContrats->execute($params)) {
        header('location:contrats.php?alert=success_add');
    }  
?>