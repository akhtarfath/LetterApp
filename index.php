<?php session_start();

    if ($_SESSION['user-login']) {
        header('Location: pages/');
    } else {
        header('Location: pages/login/');
    }