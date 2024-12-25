<?php
    session_start();

     if(!isset($_SESSION['owner'])) {
         header('location:/views/auth/login.php');
     }

?>