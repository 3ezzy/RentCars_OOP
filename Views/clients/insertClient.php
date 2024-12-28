<?php
    require_once '../../isOwner/isOwner.php';
    require_once __DIR__ . '/../../controllers/AuthController.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $number_phone = $_POST['number_phone'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $role = 0;

        // insert new client
        $auth = new AuthController($name, $email, $address, $number_phone, $password, $confirm_password, $role);
        $createClient = $auth->register();
        if($createClient) {
            header('location:clients.php?alert=success_add');
        }
    }

?>