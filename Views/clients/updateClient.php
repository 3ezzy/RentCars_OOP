<?php
     require_once('../../isLogged/isOwner.php');
    require_once __DIR__ . '/../../controllers/UserManager.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $getId = $_POST['idUser'];
        $updateName = $_POST['updateName'];
        $updateEmail = $_POST['updateEmail'];
        $updateAddress = $_POST['updateAddress'];
        $updatePhone = $_POST['updatePhone'];

        $user = new UserManager($updateName, $updateEmail, $updateAddress, $updatePhone, "", $getId);

        if($user->update($getId)) {
            header('location:clients.php?alert=success_update');
        }
    }
?>