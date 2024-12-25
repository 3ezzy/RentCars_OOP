<?php
    session_start();
    require_once('../../connectdb/connectiondb.php');

    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    if(empty($email) && empty($password)) {
        $_SESSION['validationEmailPass'] = 'this field is required!';
        header('location:login.php');
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['validationEmail'] = 'this email not valid!';
        header('location:login.php');
        exit;
    }
    
    $checkExistOwner = mysqli_query($conn, "SELECT username, email, password
                                            FROM owners 
                                            WHERE email = '$email'");
    
    $resultOwner = mysqli_fetch_assoc($checkExistOwner);
    if($resultOwner) {
        if($email == $resultOwner['email']) {
            if(password_verify($password, $resultOwner['password'])) {
                $_SESSION['owner'] = $resultOwner;
                header('location: ../dashboard.php');
            } else {
                $_SESSION['validateCorrectEmailPass'] = 'email or password is not correct!';
                header('location:login.php');
            }
        }
    }
?>