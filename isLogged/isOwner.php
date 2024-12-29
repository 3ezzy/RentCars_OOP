<?php
    session_start();

     if(!isset($_SESSION['user']) && $_SESSION['user']['role'] == false) {
         header('location:/views/auth/login.php');
     }
?>