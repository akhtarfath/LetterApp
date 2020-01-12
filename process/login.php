<?php session_start(); include('../config/db_conn.php');

    $username = $_POST['login-username'];
    $password = $_POST['login-password'];

    $data[] = $username;
    $data[] = $password;

    try {
        $row = $conn->prepare('SELECT * FROM users WHERE username = ? AND password = MD5(?)');
        $row -> execute($data);
        $rowCount = $row -> rowCount();
    
        if ($rowCount > 0) {
            $result = $row -> fetch();
            $_SESSION['user-login'] = $result;
            header('Location: ../pages/surat/');
        } else {
            header('Location: ../pages/login/');
        }
    } catch (Exception $th) {
        echo $th->getMessage();
    }

?>