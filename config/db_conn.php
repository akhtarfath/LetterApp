<?php $dsn= "mysql:host=localhost; dbname=kmft_surat";
    try {
        $conn = new PDO($dsn, 'root', '');
        // echo 'sukses!';
    } catch (PDOException $th) {
        echo $th->getMessage();
    }