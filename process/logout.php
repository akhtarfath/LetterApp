<?php session_start();
    UNSET($_SESSION['user-login']);
    header('Location: ../pages/login/');
?>