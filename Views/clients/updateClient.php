<?php
     require_once('../../isOwner/isOwner.php');
    require_once('../../connectdb/connectiondb.php');

    // get all values
    $getId = isset($_POST['idUser']) ? $_POST['idUser'] : 0;
    $updateName = isset($_POST['updateName']) ? $_POST['updateName'] : "";
    $updateAddress = isset($_POST['updateAddress']) ? $_POST['updateAddress'] : "";
    $updatePhone = isset($_POST['updatePhone']) ? $_POST['updatePhone'] : "";

    // update information client
    $updateClient = "UPDATE clients SET name = ?, address = ?, numberPhone = ? WHERE id = ?";    
    $params = array($updateName, $updateAddress, $updatePhone, $getId);
    $resultUpdateClient = $conn->prepare($updateClient);
    
    if($resultUpdateClient->execute($params)) {
        header('location:users.php?alert=success_update');
    }
?>