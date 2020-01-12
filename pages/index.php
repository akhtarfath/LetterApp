<?php session_start();

    if ($_SESSION['user-login']) {
        header('Location: surat/');
    } else {
        echo '<script> alert("Maaf anda belum login!"); window.location = "../"; </script>';
    }