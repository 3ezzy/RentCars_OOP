<?php
session_start();

require_once('../../connectdb/connectiondb.php');


    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : "";

    $getEmail = mysqli_query($conn, "SELECT * FROM owners WHERE email = '$email'");
    $resultEmail = mysqli_num_rows($getEmail);

    $validationErrors = array();

    if(empty($username)) {
        $validationErrors[] = "username field in required!";
        $_SESSION['validationUsername'] = "username field in required!";
    }

    if(empty($email)) {
        $validationErrors[] = "email field in required!";
        $_SESSION['validationEmpEmail'] = "email field in required!";
    } else {

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validationErrors[] = "email is not a valid!";
            $_SESSION['validationEmail'] = "email is not a valid!";
        }
    }

    if(empty($password)) {
        $_SESSION['validationEmpPassword'] = "password field in required!";
        $validationErrors[] = "password field in required!";

    }

    if(empty($confirm_password)) {
        $_SESSION['validationEmpConfirmPassword'] = "password field in required!";
        $validationErrors[] = "password field in required!";

    }

    if($password != $confirm_password) {
        $validationErrors[] = "password do not match!";
        $_SESSION['validationPassword'] = "password do not match!";
    }

    if($resultEmail > 0) {
        $validationErrors[] = "this email already exist!";
        $_SESSION['validationExistEmail'] = "this email already exist!";
    }

    if($resultEmail == 0 && empty($validationErrors)) {

        $queryLogin = "INSERT INTO owners(username, email, password) VALUES(?,?,?)";
        $params = array($username, $email, password_hash($password, PASSWORD_DEFAULT));
        $resultLogin = mysqli_prepare($conn, $queryLogin);

        $resultLogin->execute($params);
        header('location:login.php');
    } else {
        header('location:register.php');
    }

?>