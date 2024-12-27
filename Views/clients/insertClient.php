<?php
     require_once('../../isOwner/isOwner.php');
    require_once('../../connectdb/connectiondb.php');
    // insert new client
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";

    $clientQuery = "INSERT INTO clients(name, address, numberPhone) VALUES(?,?,?)";
    $params = array($name, $address, $phone);

    $resultClientQuery = $conn->prepare($clientQuery);
    if($resultClientQuery->execute($params)) {
        header('location:users.php?alert=success_add');
    }
?>